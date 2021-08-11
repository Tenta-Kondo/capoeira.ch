<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous" />
    <style>

    </style>
</head>

<body>
    <div id="app" class="container-fluid">
        <div class="row credit-window">
            <div class="col-8 bg-light credit-form">
                <h1 class="mb-4" style="margin-left: 1.25rem;">Capoeira.ch 有料会員</h1>

                @if (session('errors'))
                <p class="flash_message">
                    {{ session('errors') }}
                </p>
                @endif
                <div class="card-body">
                    <form action="{{route('user.payment.store')}}" id="form_payment" method="POST">
                        {{ csrf_field() }}
                        <div style="display: flex;" class="row">
                            <div class="form-group col-7">
                                <label for="name">カード番号</label>
                                <div id="cardNumber" style="border-bottom: 0.2px #cacaca solid;"></div>
                            </div>

                            <div class="form-group col-5">
                                <label for="name">セキュリティコード</label>
                                <div id="securityCode" style="border-bottom: 0.2px #cacaca solid;"></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">有効期限</label>
                            <div id="expiration" style="border-bottom: 0.2px #cacaca solid;"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">カード名義</label>
                            <input type="text" name="cardName" id="cardName" class="form-control" value="" placeholder="カード名義を入力">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="create_token" class="btn btn-primary">カードを登録する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        const stripe = Stripe('pk_test_51Ib03OGgpEHLIOoeRe3d4KvXZetkICnkJaWdSC40N6UzJowNFXxbnbexTN3ymZ4Nn8qdv6RlhI5ddqqOWOnmcLLv00Na0n4YN6');
        const elements = stripe.elements();

        const style = {
            base: {
                border: "black 0.2px solid",
                width: "50%",
                padding: "10px"
            }
        };
        const cardNumber = elements.create('cardNumber', {
            style: style
        });
        cardNumber.mount('#cardNumber');
        const cardCvc = elements.create('cardCvc', {
            style: style
        });
        cardCvc.mount('#securityCode');
        const cardExpiry = elements.create('cardExpiry', {
            style: style
        });
        cardExpiry.mount('#expiration');

        document.querySelector('#form_payment').addEventListener('submit', function(e) {
            /* 何も処理をかまさないとそのままクレジットカード情報が送信されてしまうので一旦HTMLのFormタグがが従来もっている送信機能を停止させる。 */
            e.preventDefault();

            /* Stripe.jsを使って、フォームに入力されたコードをStripe側に送信。今回ご紹介している方法の場合、「カード名義」だけはStripe Elementsの仕組みを使っていないため、このままだとカード名義の情報が足りずにカード情報の暗号化ができなくなってしまうので、{name:document.querySelector('#cardName').value}を足すことで、フォームに入力されたカード名義情報も、他の情報と同時にStripeに送ることができるようになる。 */
            stripe.createToken(cardNumber, {
                name: document.querySelector('#cardName').value
            }).then(function(result) {


                /* errorが返ってきた場合はその旨を表示 */
                if (result.error) {
                    alert("カード登録処理時にエラーが発生しました。カード番号が正しいものかどうかをご確認いただくか、別のクレジットカードで登録してみてください。");
                } else {

                    /* 暗号化されたコードが返ってきた場合は以下のStripeTokenHandler関数を実行。その際、引数として暗号化されたコードを渡してあげる。 */
                    stripeTokenHandler(result.token);
                }
            });


            /* id="form_payment"が指定されたformの送信ボタン直前に、input type="hidden"のHTMLを挿入し、値にStripeから返ってきた暗号化情報を設定。そして、実際にフォームの内容を送信（事実上、送信されるのは暗号化情報のみとなる） */
            function stripeTokenHandler(token) {
                const form = document.getElementById('form_payment');
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }

        }, false);




        // const cardHolderName = document.getElementById('card-holder-name');
        // const cardButton = document.getElementById('card-button');

        // cardButton.addEventListener('click', async (e) => {
        //     const {
        //         paymentMethod,
        //         error
        //     } = await stripe.createPaymentMethod(
        //         'card', cardElement, {
        //             billing_details: {
        //                 name: cardHolderName.value
        //             }
        //         }
        //     );

        //     if (error) {
        //         // "error.message"をユーザーに表示…
        //     } else {
        //         // カードは正常に検証された…
        //     }
        // });
    </script>
</body>

</html>