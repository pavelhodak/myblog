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
        <?php foreach($entries as $entry): ?>
            <tr>
                <td align="center"><?php echo e($entry['article_id']); ?></td>
                <td align="center"><?php echo e($entry['title']); ?></td>
                <td align="center"><?php echo e($entry['price']); ?></td>
                <td align="center"><?php echo e($entry['amount']); ?></td>
                <td align="center"><?php echo e($entry['price'] * $entry['amount']); ?>

            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Общая сумма заказа: <?php echo e($total); ?>    </h2>
    <hr>
    <h2>Информация о доставке</h2>
    Адрес:<?php echo e($order->address); ?><br>
    Имя: <?php echo e($order->name); ?><br>
    Телефон: <?php echo e($order->phone); ?><br>
</div>
</body>
</html>