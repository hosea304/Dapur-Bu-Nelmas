<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <!-- Make sure to use the correct asset path for your CSS file -->
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}" />
</head>

<body class="aboutus" style="
            background-image: url('user/asset gambar/backgroundweb.jpg');
            background-size: cover;
            color: white;
        ">
    @include('user.navbar')
    <div class="container mt-1">
        <h2 style="
                    padding-top: 25px;
                    text-align: center;
                    font-family: monospace;
                    font-weight: bold;
                    color: white;
                    font-size: 90px;
                ">
            INFO PESANAN
        </h2>
        <div class="table-responsive" style="border-radius: 10px">
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pesanan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataOrderLine as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->alamat }}</td>
                        <td>{{ $order->namaMakanan }}</td>
                        <td>
                            Rp.
                            {{ number_format($order->subtotal, 0, ',', '.') }}
                        </td>
                        <td style="padding: 5px; text-align: center; border-radius: 5px;
                                @if ($order->status == 0) background-color: red; color: white;
                                @elseif ($order->status == 1) background-color: yellow; color: black;
                                @else background-color: green; color: white; @endif">
                                @if ($order->status == 0) Pesanan diproses
                                @elseif ($order->status == 1) Pesanan diantar
                                @else Pesanan selesai @endif
                            </td>
                        <td>
                            {{ $order->created_at->format('d F Y H:i:s') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>