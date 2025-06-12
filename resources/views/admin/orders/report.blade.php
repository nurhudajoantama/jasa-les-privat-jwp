<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pesanan Selesai</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border:1px solid #666; padding:8px; text-align:left; }
        th { background:#eee; }
    </style>
</head>
<body>
    <h2>Laporan Pesanan Completed</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Course</th>
                <th>Email</th>
                <th>Jadwal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $i => $order)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $order->course->title }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->schedule->format('Y-m-d H:i') }}</td>
                <td>{{ ucfirst($order->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
