<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\SubscribeRequest;
use Stripe\Product;
use Stripe\Plan;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;

class SubscriptionController extends Controller
{
  public function userpage()
  {
    $user = Auth::user();
    $defaultCard2 = "";
    return view('subscription.subscriptCreate', compact('user', 'defaultCard2'));
  }
  public function getCurrentPayment()
  {
    $user = Auth::user();
    $defaultCard = Payment::getDefaultcard($user);
    dd($defaultCard);
    return view('subscription.index', compact('user', 'defaultCard'));
  }

  public function getPaymentForm()
  {

    $user = Auth::user();
    if ($user->stripe_id) {
      return redirect("/user-page");
    }
    return view('subscription.subscript', compact("user"));
  }


  public function storePaymentInfo(Request $request)
  {
    $token = $request->stripeToken;
    $user = Auth::user();
    $ret = null;

    if ($token) {

      if (!$user->stripe_id) {

        $result = Payment::setCustomer($token, $user);

        /* card error */
        if (!$result) {

          $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
          return redirect('/user/payment/form')->with('errors', $errors);
        }
      } else {
        //ここ
        $defaultCard2 = Payment::getDefaultcard($token, $user);

        return view('subscription.subscriptCreate', compact('user', 'defaultCard2'))->with("success", "カード情報の登録が完了しました。");
      }
    } else {

      return redirect('/user/payment/form')->with('errors', '申し訳ありません、通信状況の良い場所で再度ご登録をしていただくか、しばらく立ってから再度登録を行ってください。');
    }

    $defaultCard2 = Payment::getDefaultcard($token, $user);

    return view('subscription.subscriptCreate', compact('user', 'defaultCard2'))->with("success", "カード情報の登録が完了しました。");

    // return redirect('/user/payment')->with("success", "カード情報の登録が完了しました。")->with(compact("token"));
  }


  public function deletePaymentInfo()
  {
    $user = User::find(Auth::id());

    // $stripe = new \Stripe\StripeClient(
    //   \Config::get('payment.stripe_secret_key')
    // );
    // $customer = $stripe->customers->retrieve(
    //   $user->stripe_id,
    //   []
    // );
    // dd($customer);
    $result = Payment::deleteCard($user);
    $Customer = User::find(Auth::id());
    $Customer->stripe_id = null;
    $Customer->update();

    if ($result) {
      return redirect('/user-page')->with("success", "カード情報の削除が完了しました。");
    } else {
      return redirect('/user-page')->with("errors", "カード情報の削除に失敗しました。恐れ入りますが、通信状況の良い場所で再度お試しいただくか、しばらく経ってから再度お試しください。");
    }
  }


  public function becomePaidMember()
  {
    \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));
    try {

      $user = User::find(Auth::id());

      $stripe = new \Stripe\StripeClient(
        \Config::get('payment.stripe_secret_key')
      );
      $subscription = $stripe->subscriptions->create([
        'customer' => $user->stripe_id,
        'items' => [
          ['price' => 'price_1IvLOfGgpEHLIOoeGFs7MVwp'],
        ],
      ]);

      $user->subscriptionID = $subscription->id;
      $user->save();
    } catch (\Stripe\Exception\CardException $e) {
      $body = $e->getJsonBody();
      $errors  = $body['error'];
      return redirect('/user/info')->with('errors', "決済に失敗しました。しばらく経ってから再度お試しください。");
    }

    $user->status = 1;
    $user->save();
    return redirect("/user-page")->with("success", "有料会員登録が完了しました。");
  }


  public function cancelPaidMember(Request $request)
  {

    $user = User::find(Auth::id());

    $stripe = new \Stripe\StripeClient(
      \Config::get('payment.stripe_secret_key')
    );

    $stripe->subscriptions->cancel(
      $user->subscriptionID, //
      []
    );

    $user->status = 0;
    $user->save();
    return redirect("/user-page")->with("success", "有料会員解約が完了しました。");
  }
  public function paidpage()
  {
    $user = Auth::user();
    if ($user->status === 1) {
      return view("Subscription.test");
    } else {
      return redirect("/");
    }
  }
}
