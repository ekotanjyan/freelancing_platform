<script src="https://js.stripe.com/v3"></script>

@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>Complete Stripe Payment</h2>
                    </div>
                    <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <button class="wt-btn" onclick="continue_checkout()"
                                      >Go to stripe Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    function continue_checkout(){
        var stripe = Stripe('pk_test_RMNWdU6nBgL1DAw9AtGOV1X100UKwPylmJ');

        // When the customer clicks on the button, redirect
        // them to Checkout.
        stripe.redirectToCheckout({
            items: [{plan: "<?php echo $plan_id;?>", quantity: 1}],

            // Do not rely on the redirect to the successUrl for fulfilling
            // purchases, customers may not always reach the success_url after
            // a successful payment.
            // Instead use one of the strategies described in
            // https://stripe.com/docs/payments/checkout/fulfillment
            successUrl: APP_URL + '/register/checkout_complete/'+"<?php echo $stripe_token; ?>",
            cancelUrl: APP_URL,
        })
            .then(function (result) {
                if (result.error) {
                    // If `redirectToCheckout` fails due to a browser or network
                    // error, display the localized error message to your customer.
                    var displayError = document.getElementById('error-message');
                    displayError.textContent = result.error.message;
                }
            });
    }

</script>