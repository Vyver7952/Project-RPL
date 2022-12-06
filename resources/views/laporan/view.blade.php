<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href={{ asset('img/Logo.png') }} type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        th, h1, p {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row border-bottom mb-3">
            <div class="d-flex justify-content-center">
                <h1>Koperasi Artha Pratama</h1>
                @if (empty($end))
                    <p>{{ \Carbon\Carbon::parse($start)->format('F Y') }}</p>
                @else
                    <p>{{ \Carbon\Carbon::parse($start)->format('F Y') }} -
                        {{ \Carbon\Carbon::parse($end)->format('F Y') }}</p>
                @endif
            </div>
        </div>
        <table class="table table-striped table-sm">
            <tr class="text-lg-center">
                <th colspan="2">Simpanan</th>
            </tr>
            <tr>
                <td>Jumlah Nasabah yang Menyetor Simpanan</td>
                <td>{{ $jumlahSimpanan }} Nasabah</td>
            </tr>
            <tr>
                <td>Total Simpanan</td>
                <td>@convert($totalSimpanan)</td>
            </tr>
            <tr class="text-lg-center">
                <th colspan="2">Peminjaman</th>
            </tr>
            <tr>
                <td>Jumlah Nasabah yang Menyetor Peminjaman</td>
                <td>{{ $jumlahPeminjaman }} Nasabah</td>
            </tr>
            <tr>
                <td>Total Peminjaman</td>
                <td>@convert($totalPeminjaman)</td>
            </tr>
        </table>
    </div>
</body>

</html>
