<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Daftar Kontrak</title>

    <style>

        body{

            font-family: DejaVu Sans, sans-serif;

            font-size:12px;

        }

        h2{

            text-align:center;

            margin-bottom:20px;

        }

        table{

            width:100%;

            border-collapse:collapse;

        }

        table th{

            background:#15803d;

            color:white;

            border:1px solid #000;

            padding:8px;

            text-align:center;

        }

        table td{

            border:1px solid #000;

            padding:7px;

        }

        .center{

            text-align:center;

        }

    </style>

</head>

<body>

<h2>

DAFTAR KONTRAK TENANT<br>

BADAN PENGUSAHAAN BATAM

</h2>

<table>

<thead>

<tr>

<th>No</th>

<th>Tenant</th>

<th>Nomor Kontrak</th>

<th>Judul</th>

<th>Tanggal</th>

<th>Mulai</th>

<th>Selesai</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($contracts as $contract)

<tr>

<td class="center">

{{ $loop->iteration }}

</td>

<td>

{{ $contract->tenant->nama_tenant }}

</td>

<td>

{{ $contract->nomor_kontrak }}

</td>

<td>

{{ $contract->judul_kontrak }}

</td>

<td class="center">

{{ $contract->tanggal_kontrak->format('d/m/Y') }}

</td>

<td class="center">

{{ $contract->mulai->format('d/m/Y') }}

</td>

<td class="center">

{{ $contract->selesai->format('d/m/Y') }}

</td>

<td class="center">

{{ $contract->status_kontrak }}

</td>

</tr>

@endforeach

</tbody>

</table>

<br><br>

<table style="border:none;">

<tr style="border:none;">

<td style="border:none;width:65%;"></td>

<td style="border:none;text-align:center;">

Batam,

{{ now()->translatedFormat('d F Y') }}

<br><br><br><br>

__________________________

<br>

Administrator

</td>

</tr>

</table>

</body>

</html>