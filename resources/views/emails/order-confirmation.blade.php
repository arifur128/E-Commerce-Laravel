<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 30px;
        }
        .order-info {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .order-info h3 {
            margin-top: 0;
            color: #2563eb;
        }
        .order-items {
            margin: 20px 0;
        }
        .item {
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 0;
        }
        .item:last-child {
            border-bottom: none;
        }
        .total {
            background: #2563eb;
            color: white;
            padding: 20px;
            text-align: right;
            font-size: 24px;
            font-weight: bold;
        }
        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            background: #1f2937;
            color: #9ca3af;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Order Confirmed!</h1>
            <p>Thank you for your order</p>
        </div>

        <div class="content">
            <p>Hi <strong>{{ $order->customer_name }}</strong>,</p>
            <p>Your order has been received and is being processed. We'll send you another email when your order has been shipped.</p>

            <div class="order-info">
                <h3>Order Details</h3>
                <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M, Y h:i A') }}</p>
                <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                <p><strong>Transaction ID:</strong> {{ $order->transaction_id }}</p>
                <p><strong>Status:</strong> <span style="color: #f59e0b;">{{ ucfirst($order->status) }}</span></p>
            </div>

            <h3>Order Items</h3>
            <div class="order-items">
                @foreach($order->orderItems as $item)
                <div class="item">
                    <strong>{{ $item->product->name }}</strong>
                    @if($item->size)
                        <span style="color: #2563eb;">(Size: {{ $item->size }})</span>
                    @endif
                    <br>
                    <span style="color: #6b7280;">Quantity: {{ $item->quantity }} × TK{{ number_format($item->price, 2) }}</span>
                    <br>
                    <strong>TK{{ number_format($item->price * $item->quantity, 2) }}</strong>
                </div>
                @endforeach
            </div>

            <div class="order-info">
                <h3>Shipping Address</h3>
                <p>{{ $order->shipping_address }}</p>
                <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
            </div>

            @if($order->note)
            <div class="order-info" style="background: #fef3c7; border-left: 4px solid #f59e0b;">
                <h3 style="color: #92400e;">Order Note</h3>
                <p style="color: #92400e;">{{ $order->note }}</p>
            </div>
            @endif

            <div class="total">
                Total Amount: TK{{ number_format($order->total_amount, 2) }}
            </div>

            <center>
                <a href="{{ url('/my-orders') }}" class="button">View Order Details</a>
            </center>

            <p style="margin-top: 30px; color: #6b7280; font-size: 14px;">
                If you have any questions, please contact us at support@jerseyshop.com or call +880 1234-567890
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Jersey Shop. All rights reserved.</p>
            <p>You're receiving this email because you placed an order on our website.</p>
        </div>
    </div>
</body>
</html>