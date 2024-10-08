<div class="container mx-auto px-4  pb-12">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Terms and Conditions</h1>
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">1. Direct Seller Business Model</h2>
            <p class="text-gray-700">
                Biharshop operates as a direct selling e-commerce platform. Sales Executives are independent agents who
                promote and sell our products. As part of the onboarding process, Sales Executives are required to
                complete our coding training program, which costs <span class="font-semibold">₹243</span>.
            </p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">2. Sales Executive Responsibilities</h2>
            <p class="text-gray-700">
                As a Sales Executive, you are responsible for:
            </p>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                <li>Selling Biharshop products in compliance with applicable laws and company policies.</li>
                <li>Adhering to the ethical standards set by Biharshop.</li>
                <li>Maintaining accurate records of sales and transactions.</li>
            </ul>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">3. Accidental Death Benefit</h2>
            <p class="text-gray-700">
                In the unfortunate event of a Sales Executive's death due to an accident within one year from the date
                of joining, the following benefits apply:
            </p>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                <li><span class="font-semibold">Best Permanent Salary:</span> The family or nominee will be entitled to
                    receive the best permanent salary offered by Biharshop, depending on their position at the time of
                    death.</li>
                <li><span class="font-semibold">Financial Support:</span> A sum of ₹2,00,000/- (Two Lakh Rupees) will be
                    paid to the nominee of the deceased Sales Executive as financial assistance.</li>
            </ul>
        </div>
        <div class="my-4">
            <label class="flex items-center space-x-3">
                <input type="checkbox" wire:model="terms" required name="terms"
                    class="w-5 h-5 text-blue-500 focus:ring-blue-500" required>
                <span class="text-sm">I agree to the <a href="#" class="text-blue-500">terms and
                        conditions</a>.</span>
            </label>
        </div>
        <div class="flex justify-between space-x-4">
            <button type="submit" id="pay-button"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-lg hover:from-blue-600 hover:to-indigo-600 shadow-lg">
                Proceed To Payment
            </button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <form action="{{ route('save.membership.payment') }}" method="post" id="payment-form">
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" value="">
        <input type="hidden" value="{{ $data->token }}" name="token" id="token">
        {{-- <input type="hidden" value="{{ number_format($total, 2) }}" name="amount" id="amount"> --}}
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            document.getElementById('pay-button').onclick = function(e) {
                e.preventDefault();
                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}",
                    "amount": "{{ number_format(250) }}" * 100,
                    "currency": "INR",
                    "name": "BiharShop",
                    "description": "Processing Fee",
                    "image": "{{ asset('front_assets/img/logo/logo.png') }}",
                    "handler": function(response) {
                        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                        document.getElementById('payment-form').submit();
                    },
                    "prefill": {
                        "name": "roni",
                        "email": "r@gmail.com",
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
    </form>
</div>
