<div class="mb-4">
    <div class="flex justify-between items-center border-b pb-2">
        <div class="flex items-center space-x-2">
            <span class="text-slate-100 bg-zinc-800 rounded-full w-6 h-6 flex justify-center items-center">4</span>
            <h3 class="text-lg font-semibold">PAYMENT OPTIONS</h3>
        </div>
    </div>

    <div class="container my-5">
    <div class="form-check mb-3 flex items-center gap-2">
        <input class="w-4 h-4 text-slate-500 focus:ring-slate-500" type="radio" name="payment_method" id="upi" value="UPI" checked>
        <label class="form-check-label" for="upi">UPI</label>
    </div>
    <div class="form-check mb-3 flex items-center gap-2">
        <input class="w-4 h-4 text-slate-500 focus:ring-slate-500" type="radio" name="payment_method" id="cod" value="COD">
        <label class="form-check-label" for="cod">Cash On Delivery</label>
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
            <div class="flex gap-2 mt-6 justify-center">
                <div class="mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-10" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="gray" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                </div>
                <div class="flex flex-col font-bold text-lg">
                    <p class="text-balance text-zinc-400">Safe and Secure Payment.easy return</p>
                    <p class="text-balance text-zinc-400">100% Authentic products</p>
                </div>

            </div>

    </div>