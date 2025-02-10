<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan History Paging System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Laporan History Paging System</h2>
    <p style="text-align: center;">Dari: {{ $startDate }} - Sampai: {{ $endDate }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pemanggilan</th>
                <th>Tujuan</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyCalls as $index => $call)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $call->jenis_pemanggilan }}</td>
                    <td>{{ $call->nama_mesin }}</td>
                    <td>{{ \Carbon\Carbon::parse($call->created_at)->format('d-m-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>