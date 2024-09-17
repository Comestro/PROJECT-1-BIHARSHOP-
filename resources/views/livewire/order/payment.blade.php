<div class="mb-4">
    <div class="flex justify-between items-center border-b pb-2">
        <div class="flex items-center space-x-2">
            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">4</span>
            <h3 class="text-lg font-semibold">PAYMENT OPTIONS</h3>
        </div>
    </div>

    <div class="container my-5">
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="payment_method" id="upi" value="UPI"
                    checked>
                <label class="form-check-label" for="upi">
                    UPI
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="payment_method" id="upi" value="UPI"
                    checked>
                <label class="form-check-label" for="upi">
                    Cash On Delivery
                </label>
            </div>
            <!-- Submit Button -->
            @if ($orders->address_id)
        <button type="submit" id="pay-button" class="w-full bg-black text-white py-3 rounded-lg font-bold">
            Proceed to Payment
        </button>
    @endif
            {{-- <button type="submit" class="btn btn-primary">Proceed with Payment</button> --}}
    </div>





<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<form action="{{ route('save.online.payment') }}" method="post" id="payment-form">
    @csrf
    
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" value="">
    <input type="hidden" value="{{ $orders->id }}" name="order_id" id="order_id">
    <input type="hidden" value="{{ number_format($total, 2) }}" name="amount" id="amount">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('pay-button').onclick = function(e) {
            e.preventDefault();
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "amount": "{{ number_format($total, 2) }}" * 100,
                "currency": "INR",
                "name": "BiharShop",
                "description": "Processing Fee",
                "image": "{{ asset('front_assets/img/logo/logo.png') }}",
                "handler": function(response) {
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('payment-form').submit();
                },
                "prefill": {
                    "name": "Roni",
                    "email": "roni@gmail.com",
                    "contact": "9128528958"
                },
                "theme": {
                    "color": "#0a64a3"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    </script>

</div>

