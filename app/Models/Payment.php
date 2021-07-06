<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

use function Psy\sh;

class Payment extends Model
{
    /**
     * Stripe上に「顧客」を登録するための関数
     *
     * @param String $token・・・・・Stripe上のtoken（フロントエンドで作成）
     * @param object $user ・・・・・カード登録をするユーザーの情報
     * @param object $customer・・・Stripe上に登録する顧客オブジェクト
     */

    public static function setCustomer($token, $user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));


        try {

            $customer = \Stripe\Customer::create([

                'name' => $user->name,
                'description' => $user->id,
                'email' => $user->email,
                'source' => $token,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            dd($e);
            return false;
        }

        $targetCustomer = null;

        if (isset($customer->id)) {

            $targetCustomer = User::find(Auth::id());
            $targetCustomer->stripe_id = $customer->id;
            $targetCustomer->status = 0;
            $targetCustomer->update();

            return true;
        }

        return false;
    }


    /**
     * 
     *
     * @param String $token・・・・・Stripe上のtoken（フロントエンドで作成）
     * @param object $user ・・・・・カード登録をするユーザーの情報
     * @param object $customer・・・Stripe上に登録されている顧客オブジェクト
     * @param object $card・・・・・Stripe上に登録されているクレジットカード情報のオブジェクト
     */
    public static function updateCustomer($token, $user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

        try {
            $customer = \Stripe\Customer::retrieve($user->stripe_id);
            $card = $customer->sources->create(['source' => $token]);

            if (isset($customer)) {
                $customer->default_source = $card["id"];
                $customer->save();
                return true;
            }
        } catch (\Stripe\Exception\CardException $e) {

            return false;
        }

        return true;
    }

    /**
     * 
     *
     * @param String $token・・・・・Stripe上のtoken（フロントエンドで作成）
     * @param object $user ・・・・・カード登録をするユーザーの情報
     * @param object $customer・・・Stripe上に登録されている顧客オブジェクト
     * @param object $default_card・・・・・Stripe上から取得した顧客の「使用カード」オブジェクト
     */
    protected static function getDefaultcard($token, $user)
    {
        //
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));
        //


        //customer情報を取得しても、その中にsource(カード情報)がないので、tokenから直接引っ張ってくる

        $card = \Stripe\Token::retrieve($token, [])->card;


        $default_card = [
            'number' => str_repeat('*', 8) . $card->last4,
            'brand' => $card->brand,
            'exp_month' => $card->exp_month,
            'exp_year' => $card->exp_year,
            'name' => $card->name,
            'id' => $card->id,
        ];;



        return $default_card;
    }

    /**
     *
     *
     * @param object $user ・・・・・カード削除をするユーザーの情報
     * @param object $customer・・・Stripe上に登録されている顧客オブジェクト
     */
    protected static function deleteCard($user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));
        // $card = \Stripe\Token::retrieve($token, [])->card;
       
        if ($user->stripe_id) {
            $stripe = new \Stripe\StripeClient(
                \Config::get('payment.stripe_secret_key')
            );
            
            $stripe->customers->delete(
                $user->stripe_id,
                []
            );
            
            return true;
        }

        return false;
    }
}
