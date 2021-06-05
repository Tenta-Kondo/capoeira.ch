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
  public function getCurrentPayment()
  {
    $user = Auth::user();
    $defaultCard = Payment::getDefaultcard($user);

    return view('subscription.index', compact('user', 'defaultCard'));
  }

  public function getPaymentForm()
  {
    $user = Auth::user();
    return view('subscription.subscript', compact("user"));
  }


  public function storePaymentInfo(Request $request)
  {
    $token = $request->stripeToken;
    $user = Auth::user();
    $ret = null;

    if ($token) {

      dd("err");
      /**
       *  Stripe上にCustomer（顧客）が存在しているかどうかによって処理内容が変わる。
       *
       * 「初めての登録」の場合は、Stripe上に「Customer（顧客」と呼ばれる単位の登録をして、その後に
       * クレジットカードの登録が必要なので、一連の処理を内包しているPaymentモデル内のsetCustomer関数を実行
       *
       * 「2回目以降」の登録（別のカードを登録など）の場合は、「Customer（顧客」を新しく登録してしまうと二重顧客登録になるため、
       *  既存のカード情報を取得→削除→新しいカード情報の登録という流れに。
       *
       **/

      if (!$user->stripe_id) {
        dd("err2");
        $result = Payment::setCustomer($token, $user);

        /* card error */
        if (!$result) {
          $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
          return redirect('/user/payment/form')->with('errors', $errors);
        }
      } else {
        dd("err3");
        $defaultCard = Payment::getDefaultcard($user);
        if (isset($defaultCard['id'])) {
          Payment::deleteCard($user);
        }

        $result = Payment::updateCustomer($token, $user);

        /* card error */
        if (!$result) {
          $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
          return redirect('/user/payment/form')->with('errors', $errors);
        }
      }
    } else {
      dd("err4");
      return redirect('/user/payment/form')->with('errors', '申し訳ありません、通信状況の良い場所で再度ご登録をしていただくか、しばらく立ってから再度登録を行ってみてください。');
    }

    dd("err5");
    return redirect('/user/payment')->with("success", "カード情報の登録が完了しました。");
  }


  public function deletePaymentInfo()
  {
    $user = User::find(Auth::id());

    $result = Payment::deleteCard($user);

    if ($result) {
      return redirect('/user/payment')->with('success', 'カード情報の削除が完了しました。');
    } else {
      return redirect('/user/payment')->with('errors', 'カード情報の削除に失敗しました。恐れ入りますが、通信状況の良い場所で再度お試しいただくか、しばらく経ってから再度お試しください。');
    }
  }
}
