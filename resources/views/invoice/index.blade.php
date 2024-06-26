<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="invoice p-3 mb-3">
            <header class="invoice-header">
                <div class="row">
                    <div class="col">
                        <h2 class="name">
                            <a target="_blank" href="#">
                                SIMLaptop
                            </a>
                        </h2>
                        <div>Jl. Ardipura Raya No.22B, Ardipura, Distrik Jayapura Selatan, Kota Jayapura, Papua 99222</div>
                        <div>simlaptop@gmail.com</div>
                        <div>012-345-6789</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Invoice #{{ $orderDetail->pelanggan->id }}</h1>
                        <div class="date">Invoice Date: {{ $orderDetail->date }}</div>
                        <div class="date">Order No: {{ $orderDetail->id }}</div>
                        <span class="badge bg-success">Paid</span>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Billed To:</div>
                        <h2 class="to">{{ $orderDetail->pelanggan->nama }}</h2>
                        <div class="address">{{ $orderDetail->pelanggan->alamat }}</div>
                        <div class="email"><a href="#">{{ $orderDetail->pelanggan->email }}</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderPelanggan as $op)
                                <tr>
                                    <td class="no">{{ $loop->iteration }}</td>
                                    <td class="text-start"><h3>{{ $op->laptop->nama }}</h3></td>
                                    <td class="unit">Rp.{{ number_format($op->harga, 0, ',', '.') }}</td>
                                    <td class="qty">{{ $op->Qty }}</td>
                                    <td class="total">Rp.{{ number_format($op->total, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Total</td>
                                    <td>Rp.{{ number_format($totalAll, 0, '.', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </main>
            <div class="invoice-footer">
                <button class="btn btn-primary" onclick="window.print()">Print</button>
                <a href="/order" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
