<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment</title>
</head>
<body>
<form action="{{ route('user.payment.charge') }}" method="POST">
    @csrf
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_PUB_KEY') }}"
            data-amount="1999"
            data-name="Subscription"
            data-description="Online subscription about REVV Org."
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="eur">
    </script>
</form>
</body>
</html>