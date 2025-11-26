<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pendaftaran - {{ $namaBulan }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2, h4 {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .header {
            margin-bottom: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            background: #e8e8e8;
        }

        th, td {
            padding: 6px;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            font-size: 11px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Klinik Sehat</h2>
        <h4>Laporan Pendaftaran Janji Temu</h4>
        <p><strong>Bulan:</strong> {{ $namaBulan }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pendaftaran as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->pasien->user->name }}</td>
                <td>{{ $p->dokter->nama }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->keluhan }}</td>
                <td>{{ ucfirst($p->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d-m-Y H:i') }}
    </div>

</body>
</html>
