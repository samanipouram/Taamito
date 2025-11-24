<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'shabnam';
            src: url("{{ asset('fonts/Shabnam-FD.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'shabnam', sans-serif;
            direction: rtl;
            text-align: right;
        }
        h1, h2, h3 {
            font-family: 'shabnam', sans-serif;
        }

        table{
            width: 100%;
        }
        table th{
            font-weight: normal;
        }
        table.padding th{
            padding: .25rem .7rem;
        }
        table.padding td{
            padding: .25rem .7rem;
        }
        table.sm-padding td{
            padding: .1rem .7rem;
        }
        .text-left{
            text-align:left;
        }
        .text-right{
            text-align:right;
        }

        .text-center {
            text-align: center;
        }
        td ,th {
            padding: 7px;
        }
        table, th, td {
            border: 1px solid #6c6c6c;
            border-collapse: collapse;
        }
        .border-0 {
            border: 0;
        }
        .border-0 th {
            border: 0;
        }
        .border-0 td {
            border: 0;
        }

        .border-bottom td,
        .border-bottom th{
            border-bottom:1px solid #6c6c6c;
        }
    </style>
</head>
<body>
<table class="border-0">
    <tr>
        <td>
        </td>
        <td style="font-size: 1.5rem;text-align: center" class="strong">فاکتور فروش کالا و خدمات</td>
        <td class="text-right">
            <span><strong>شماره فاکتور:</strong> {{ $order['id'] }}</span>
            <br>
        </td>
    </tr>
</table>
<table style="margin-top: 20px;">
    <tr>
        <td>نام مشتری: {{ isset($order['user']) ? $order['user']['full_name'] : 'نامشخص' }}</td>
        <td>شماره موبایل: {{ isset($order['user']) ? $order['user']['mobile'] : 'نامشخص' }}</td>
    </tr>
</table>

<table style="margin-top: 20px;">
    <thead>
    <tr>
        <th>#</th>
        <th>نام کالا</th>
        <th>تعداد</th>
        <th>قیمت واحد</th>
        <th>جمع کل</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order['items'] as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item['product_name'] . ' - ' . $item['combination_text'] }}</td>
            <td>{{ $item['count'] }}</td>
            <td>{{ number_format($item['price']) }}</td>
            <td>{{ number_format($item['total']) }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td>جمع کل: {{ number_format($order['total']) }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
