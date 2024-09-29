<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1 class="text-2xl font-semibold">Order Confirmation</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Hello [Customer Name],</p>
            <p>Thank you for your order! Your order <strong>[Order Name]</strong> has been placed successfully.</p>

            <!-- Product Image -->
            <div class="mt-4 text-center">
                <img src="[Image URL]" alt="[Product Name]" class="inline-block w-full max-w-xs rounded-lg shadow-md">
            </div>

            <!-- Order Details -->
            <div class="mt-6">
                <h2 class="text-xl font-bold">Order Summary</h2>
                <p>Order Name: <strong>[Order Name]</strong></p>
                <p>Order ID: <strong>{{$mailData['order_number']}}</strong></p>
                <p>Total Amount: <strong>{{$mailData['total_amount']}}</strong></p>
                @if ($mailData['payment_status']== 'paid')

                <p>Payment Status: Paid</p>

                @else

                <p>Payment Status:Unpaid</p>

                @endif

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>If you have any questions, feel free to contact us at BiharShop@example.com.</p>
            <p>&copy; 2024 BiharShop. All rights reserved.</p>
        </div>
    </div>



</body>

</html>