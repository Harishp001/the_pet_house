<!DOCTYPE html>
<html>
<head>
    <title>Purchase Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            height: 450px;
            width: 1000px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            vertical-align: top;
        }
        strong {
            font-weight: bold;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>Purchase Receipt</h2>
        <p>Date: <?php date_default_timezone_set('Asia/Kolkata'); $time = date('Y-m-d H:i:s'); echo $time; ?></p>
        <p>Customer: John Doe</p>
        <table>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Product A</td>
                <td>2</td>
                <td>$50.00</td>
                <td>$100.00</td>
            </tr>
            <!-- Repeat for other items -->
            <tr>
                <td colspan="3"><strong>Total:</strong></td>
                <td><strong>$100.00</strong></td>
            </tr>
        </table>
    </div>
    <button onclick="window.print()">Print Receipt</button>

</body>
</html>
