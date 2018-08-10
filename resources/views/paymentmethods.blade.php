<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="payment.php" class="ui form" id="payment_form" method="post">
                <div class="field">

                    <input type="text" name="name" placeholder="Name" required>

                </div>
                <div class="field">

                    <input type="text" name="email" placeholder="your@email.fr" required>

                </div>
                <div class="field">

                    <input type="text" placeholder="16 Numbers of CreditCard" data-stripe="number">

                </div>
                <div class="field">

                    <input type="text" placeholder="MM" data-stripe="exp_month">

                </div>
                <div class="field">

                    <input type="text" placeholder="YY" data-stripe="exp_year">

                </div>
                <div class="field">

                    <input type="text" placeholder="CVC" data-stripe="cvc">

                </div>

                <p>

                    <button class="ui button" type="submit">Purchase</button>

                </p>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('pk_test_jAEtHrRKRj8QyQ55tzAz8001');

    var $form = $('#payment_form');

    $form.submit(function (e){

        e.preventDefault();
        Stripe.card.createToken($form, function (status, response){
            if (response.error){
                $form.find('.message').remove();
                $form.prepend('<div class="ui negative message"><p>' + reponse.error.message + '</p></div>');
            } else {
                var token = reponse.id;
                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                $form.get(0).submit();
            }
        })
    })
</script>
</html>