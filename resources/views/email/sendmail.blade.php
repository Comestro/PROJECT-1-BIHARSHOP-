<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ThankYou For Placing Order your OrderNumber is {{$mailData['order_number']}}</h1>
    @if ($mailData['payment_status']== 'paid')
    
        <p>Payment Status: Paid</p>
    
    @else
    
        <p>Payment Status:Unpaid</p>
    
    @endif
    <p>Total Amount:{{$mailData['total_amount']}}</p>
   
</body>
</html>