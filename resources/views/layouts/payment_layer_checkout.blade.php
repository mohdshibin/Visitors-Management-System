<html>
<!-- To make Layer checkout responsive on your checkout page.-->
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!--Please add either of the following script to your HTML depending up on your environment-->

<!--For Sandbox-->
<script id="context" type="text/javascript" src="https://sandbox-payments.open.money/layer"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--OR-->

<!--For Production-->
{{-- <script id="context" type="text/javascript" src="https://payments.open.money/layer"></script> --}}

<body>


    <button id="checkoutButton">Proceed</button>
    <script>
        // Find the button element by its id or class
        var checkoutButton = document.getElementById("checkoutButton");
        //var csrfToken = document.querySelector('meta[name="csrf-token"]');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        // Bind a click event listener to the button
        checkoutButton.addEventListener("click", function() {
            // Call Layer.checkout() when the button is clicked
            Layer.checkout({
                token: "{{ $payment_token }}",
                accesskey: "{{ env('PAYMENT_ACCESS_KEY') }}",
                theme: {
                    logo: "https://open-logo.png",
                    color: "#3d9080",
                    error_color: "#ff2b2b"
                }
            }, function(response) {
                var redirectUrl = "{{ route('payment.callback') }}";
                redirectUrl += "?status=" + response.status + "&token=" + response.payment_token_id;
                //{status: 'captured', payment_id: 'sb_py_BWNzbMfQybC9QJ6', payment_token_id: 'sb_pt_BWNzbGz5Zzg01DY', button: false}
                window.location.href = redirectUrl;
                // Handle the response after the payment process
                // if (response.status == "captured") {
                //     // Payment is captured
                //     window.location.href = "{{ route('payment.callback') }}";
                // } else if (response.status == "created") {
                //     // Payment is created but not captured
                // } else if (response.status == "pending") {
                //     // Payment is pending
                // } else if (response.status == "failed") {
                //     // Payment failed
                //     window.location.href = "failure_redirect_url";
                // } else if (response.status == "cancelled") {
                //     // Payment is cancelled
                //     window.location.href = "cancel_redirect_url";
                // }



            }, function(err) {
                // Handle integration errors
            });
        });
    </script>
</body>
