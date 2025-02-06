<!DOCTYPE html>
<html>

<head>
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Struk Transaksi</h2>
        <p>Tanggal: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table class="table">
        <tr>
            <th>Quantity</th>
            <td>{{ $transaction->quantity }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Dibayar</th>
            <td>Rp {{ number_format($transaction->paid, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Kembalian</th>
            <td>Rp {{ number_format($transaction->change, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="total">
        <p>Terima kasih atas kunjungan Anda</p>
    </div>
</body>

</html>
