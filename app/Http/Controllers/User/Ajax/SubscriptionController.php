<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubscribeRequest;
use Stripe\Product;
use Stripe\Plan;
class SubscriptionController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $user          = $request->user();
        $priceId       = $request->get('plan');
        $paymentMethod = $request->get('stripeToken');

        // price id から plan を取得
        $plan = Plan::retrieve($priceId);
        // prod id から product を取得
        $product   = Product::retrieve($plan->product);
        $localName = $product->metadata->localName;

        // サブスクリプション開始
        $user->newSubscription($localName, $priceId)->create($paymentMethod);

        return redirect('/home');
    }
     
    
}
