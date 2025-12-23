<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $order->order_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
            font-size: 32px;
        }
        .header p {
            color: #6b7280;
            margin: 5px 0;
        }
        .invoice-info {
            margin-bottom: 30px;
        }
        .invoice-info table {
            width: 100%;
        }
        .invoice-info td {
            padding: 5px;
        }
        .invoice-info .label {
            font-weight: bold;
            color: #374151;
        }
        .section-title {
            background-color: #2563eb;
            color: white;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .items-table th {
            background-color: #f3f4f6;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #d1d5db;
        }
        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }
        .total-section {
            text-align: right;
            margin-top: 20px;
        }
        .total-row {
            margin: 5px 0;
        }
        .total-label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .total-amount {
            display: inline-block;
            width: 150px;
            text-align: right;
        }
        .grand-total {
            font-size: 20px;
            color: #2563eb;
            font-weight: bold;
            border-top: 2px solid #2563eb;
            padding-top: 10px;
            margin-top: 10px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-processing {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .status-completed {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>JERSEY SHOP</h1>
        <p>Premium Football Jerseys</p>
        <p>Email: support@jerseyshop.com | Phone: +880 1234-567890</p>
    </div>

    <!-- Invoice Info -->
    <div class="invoice-info">
        <table>
            <tr>
                <td style="width: 50%;">
                    <span class="label">Invoice Number:</span> {{ $order->order_number }}<br>
                    <span class="label">Invoice Date:</span> {{ $order->created_at->format('d M, Y') }}<br><br>
                    <span class="label">Status:</span> 
                    <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                </td>
                <td style="width: 50%; text-align: right;">
                    <span class="label">Payment Method:</span> {{ ucfirst($order->payment_method) }}<br>
                    

                    <div>
    <p class="text-sm text-gray-600 mb-1">Shipping Charge</p>
    <p class="font-semibold text-gray-800">TK{{ number_format(\App\Models\Setting::get('shipping_charge', 0), 2) }}</p>
</div>


                    <span class="label">Transaction ID:</span> {{ $order->transaction_id }}
                </td>
            </tr>
        </table>
    </div>

    <!-- Customer Info -->
    <div class="section-title">CUSTOMER INFORMATION</div>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <strong>Name:</strong> {{ $order->customer_name }}<br>
                <strong>Email:</strong> {{ $order->customer_email }}<br>
                <strong>Phone:</strong> {{ $order->customer_phone }}
            </td>
            <td style="width: 50%;">
                <strong>Shipping Address:</strong><br>
                {{ $order->shipping_address }}
            </td>
            @if($order->note)
<div class="section-title">ORDER NOTE</div>
<div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
    <p style="color: #92400e; margin: 0;">{{ $order->note }}</p>
</div>
@endif
        </tr>
    </table>

    <!-- Order Items -->
    <div class="section-title">ORDER ITEMS</div>
    <table class="items-table">
      <thead>
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>Category</th>
        <th>Size</th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: right;">Unit Price</th>
        <th style="text-align: right;">Subtotal</th>
    </tr>
</thead>
        <tbody>
            @foreach($order->orderItems as $index => $item)
         <tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $item->product->name }}</td>
    <td>{{ $item->product->category->name }}</td>
    <td>{{ $item->size ?? 'N/A' }}</td>
    <td style="text-align: center;">{{ $item->quantity }}</td>
    <td style="text-align: right;">TK{{ number_format($item->price, 2) }}</td>
    <td style="text-align: right;">TK{{ number_format($item->price * $item->quantity, 2) }}</td>
</tr>
            @endforeach
        </tbody>
    </table>

<!-- Total Section -->
<div class="total-section">
    @php
        $shippingCharge = \App\Models\Setting::get('shipping_charge', 0);
        $subtotal = $order->total_amount - $shippingCharge;
    @endphp
    
    <div class="total-row">
        <span class="total-label">Subtotal:</span>
        <span class="total-amount">TK{{ number_format($subtotal, 2) }}</span>
    </div>
    <div class="total-row">
        <span class="total-label">Shipping:</span>
        <span class="total-amount">TK{{ number_format($shippingCharge, 2) }}</span>
    </div>
    <div class="total-row grand-total">
        <span class="total-label">Grand Total:</span>
        <span class="total-amount">TK{{ number_format($order->total_amount, 2) }}</span>
    </div>
</div>

    <!-- Footer -->
    <div class="footer">
        <p><strong>Thank you for your purchase!</strong></p>
        <p>For any queries, please contact us at support@jerseyshop.com</p>
        <p>© 2024 Jersey Shop. All rights reserved.</p>
    </div>
</body>
</html>