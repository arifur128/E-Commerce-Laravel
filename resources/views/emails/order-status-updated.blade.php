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
        .content {
            padding: 30px;
        }
        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 18px;
            margin: 20px 0;
        }
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        .status-processing {
            background: #dbeafe;
            color: #1e40af;
        }
        .status-completed {
            background: #d1fae5;
            color: #065f46;
        }
        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }
        .order-info {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
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
            <h1>📦 Order Status Updated</h1>
        </div>

        <div class="content">
            <p>Hi <strong>{{ $order->customer_name }}</strong>,</p>
            <p>Your order status has been updated.</p>

            <center>
                <div class="status-badge status-{{ $order->status }}">
                    {{ strtoupper($order->status) }}
                </div>
            </center>

            <div class="order-info">
                <h3 style="margin-top: 0; color: #2563eb;">Order Information</h3>
                <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M, Y') }}</p>
                <p><strong>Total Amount:</strong> TK{{ number_format($order->total_amount, 2) }}</p>
            </div>

            @if($order->status == 'processing')
                <p>Great news! Your order is now being processed. We're preparing your items for shipment.</p>
            @elseif($order->status == 'completed')
                <p>🎉 Your order has been completed and delivered successfully! We hope you enjoy your purchase.</p>
                <p>If you have any feedback or concerns, please don't hesitate to contact us.</p>
            @elseif($order->status == 'cancelled')
                <p>We're sorry to inform you that your order has been cancelled. If you have any questions, please contact our support team.</p>
            @endif

            <center>
                <a href="{{ url('/my-orders') }}" class="button">View Order Details</a>
            </center>

            <p style="margin-top: 30px; color: #6b7280; font-size: 14px;">
                Need help? Contact us at support@jerseyshop.com or call +880 1234-567890
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Jersey Shop. All rights reserved.</p>
        </div>
    </div>
</body>
</html>