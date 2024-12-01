<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
</head>



<style>
    table,
    td,
    th {
        border: 1px solid;
    }

    table {
        border-collapse: collapse;
    }
</style>


<body>
    <h1>Nota Toko Lancar Jaya</h1>
    <h5>Alamat Kediri</h5>


</body>


</html>
<table width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>



        @foreach ($detailpenjualan as $item)
            <tr>


                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->NamaProduk }}</td>
                <td>{{ rupiah($item->Harga) }}</td>
                <td>{{ $item->JumlahProduk }}</td>
                <td>{{ rupiah($item->SubTotal) }}</td>
            </tr>
        @endforeach


        <tr>
            <td colspan="4" align="right">Total Harga</td>
            <td>{{ rupiah($penjualan->TotalHarga) }}

        </tr>
        <tr>
            <td colspan="4" align="right">Jumlah Bayar</td>
            <td>{{ $totalBayar }}
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">Kembalian</td>
            <td>{{ $kembalian }}

            </td>
        </tr>


        <tr>
            <td colspan="4" align="right">Terima Kasih</td>
            </td>
        </tr>
    </tbody>
</table>
<script>
    window.print();
</script>
