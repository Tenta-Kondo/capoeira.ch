<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Requests\SubscribeRequest;
use Stripe\Product;
use Stripe\Plan;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Charge;


class SubscriptionController extends Controller
{
//     public function subscribe(Request $request)
//     {
//         $user = User::find(1);
//         $user->newSubscription('main', '
//         prod_JKz92ZRkooZ9dc')->create($stripeToken, ['email' => $email, 'phone' => $phone, 'name' => $name,]);
//         if ($request->user() && !$request->user()->subscribed('main')) {
//             // このユーザーは支払っていない顧客
//             return redirect('billing');
//         }
//         return $next($request);
//         if ($user->subscription('main')->onTrial()) {
//             //
//         }
//         if ($user->subscribedToPlan('monthly', 'main')) {
//             //
//         }
//     }
//     public function cancsl(Request $request)
//     {
//         $request->user()->subscription('main')->cancel();
//     }


    
//     public function subscription(Request $request){
//       $user=Auth::user();
//         return view('post.subscription',  [
//            'intent' => $user->createSetupIntent()
//         ]);
    
//     }
    

//     public function afterpay(Request $request){
//         // ログインユーザーを$userとする
//         $user=Auth::user();
 
//         // またStripe顧客でなければ、新規顧客にする
//         $stripeCustomer = $user->createOrGetStripeCustomer();
 
//         // フォーム送信の情報から$paymentMethodを作成する
//         $paymentMethod=$request->input('stripePaymentMethod');
 
//         // プランはconfigに設定したbasic_plan_idとする
//         $plan=config('services.stripe.basic_plan_id');
        
//         // 上記のプランと支払方法で、サブスクを新規作成する
//         $user->newSubscription('default', $plan)
//         ->create($paymentMethod);
 
//         // 処理後に'ルート設定'にページ移行
//         return redirect()->route('/SiteTop');
// }

public function index () {
    return view("subscription.subscript");
  }

  public function createSubscription (Request $request) {
    $user = Auth::user();
    $stripeToken = $request -> stripeToken;
    $user->newSubscription('main', 'price_1IvLOfGgpEHLIOoeGFs7MVwp')->create($stripeToken);
  }
}