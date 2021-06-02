<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #card-element {
            border: black 0.2px solid;
        }
    </style>
</head>

<body>
    <div id="app" class="container">
        <h1 class="mb-4">Capoeira.ch 有料会員</h1>
        <input id="card-holder-name" type="text">

        <!-- ストライプ要素プレースホルダ -->
        <div id="card-element"></div>

        <button id="card-button">
            Process Payment
        </button>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script>
        const stripe = Stripe('stripe-public-key');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            );

            if (error) {
                // "error.message"をユーザーに表示…
            } else {
                // カードは正常に検証された…
            }
        });
    </script>
</body>

</html>