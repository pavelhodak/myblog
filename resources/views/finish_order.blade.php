<!DOCTYPE html>
<html>
<head>
    <title>Заказ принят</title>
</head>
<body>
<div class="container">
    <h2>Ваш заказ принят!</h2>
    <table width=90%  align="center" border>
        <thead>
        <tr>
            <th>Идентификатор</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Итого</th>
        </tr>
        </thead>
        @foreach($entries as $entry)
            <tr>
                <td align="center">{{$entry['article_id']}}</td>
                <td align="center">{{$entry['title']}}</td>
                <td align="center">{{$entry['price']}}</td>
                <td align="center">{{$entry['amount']}}</td>
                <td align="center">{{$entry['price'] * $entry['amount']}}
            </tr>
        @endforeach
    </table>
    <h2>Общая сумма заказа: {{$total}}    </h2>
    <hr>
    <h2>Информация о доставке</h2>
    Адрес:{{$order->address}}<br>
    Имя: {{$order->name}}<br>
    Телефон: {{$order->phone}}<br>
</div>
</body>
</html>