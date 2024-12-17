<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print SPKO - {{ $spko->sw }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        .info, .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info td {
            vertical-align: top;
            padding: 5px;
        }
        .items th, .items td {
            border: 1px solid #000;
            padding: 5px;
        }
        .items th {
            background: #eee;
        }
        .footer {
            text-align: right;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<h1>Surat Perintah Kerja Operator (SPKO)</h1>
<h2>{{ $spko->sw }}</h2>

<table class="info">
    <tr>
        <td><strong>Operator:</strong> {{ $spko->employeeRelation->name }} ({{ $spko->employeeRelation->rank }})</td>
        <td><strong>Tanggal Transaksi:</strong> {{ $spko->trans_date }}</td>
    </tr>
    <tr>
        <td><strong>Proses:</strong> {{ $spko->process }}</td>
        <td><strong>Gender Operator:</strong> {{ $spko->employeeRelation->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Remarks:</strong> {{ $spko->remarks }}</td>
    </tr>
</table>

<h3>Items</h3>
<table class="items">
    <thead>
    <tr>
        <th>No</th>
        <th>Sub Category</th>
        <th>Description</th>
        <th>Carat</th>
        <th>Qty</th>
    </tr>
    </thead>
    <tbody>
    @foreach($spko->items as $i => $item)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $item->product->sub_category }}</td>
            <td>{{ $item->product->description }}</td>
            <td>{{ $item->product->carat }}</td>
            <td>{{ $item->qty }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="footer">
    <p><em>Dicetak pada: {{ date('d M Y H:i:s') }}</em></p>
</div>
</body>
</html>
