<?php $__env->startSection('content'); ?>
    <a href="/basket" class=" navbar-link navbar-text navbar-right">
        <span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span>
        <span class="badge pull-right count_order">0</span>
    </a>
    <?php if(count($orders)==0): ?>
        Your basket is empty
    <?php else: ?>
        <table width=100% class="table-responsive table-striped">
            <thead>
            <tr>
                <th>Идентификатор</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Итого</th>
                <th>Действие</th>
            </tr>
            </thead>
            <?php $total_cost=0; ?>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?php echo e($order->article_id); ?></td>
                    <td><?php if($order->image != ''): ?> <img height=50 src="<?php echo e($order->image); ?>"> <?php endif; ?></td>
                    <td><?php echo e($order->title); ?></td>
                    <td><?php echo e($order->price); ?></td>
                    <td><input class="total" type="number" step="1" min="1" value="<?php echo e($order->amount); ?>"/></td>
                    <td class="price_order"><?php echo e($order->price*$order->amount); ?></td>
                    <td><button type="button" class="btn btn-danger del_order">Удалить</button></td>
                </tr>
                <?php $total_cost += $order->price * $order->amount; ?>
            <?php endforeach; ?>
        </table>
        <p>Итого к оплате: <span style="font-size: 2em;" class="total_cost"><?php echo e($total_cost); ?></span></p>

        <hr>
        <h2>Информация о доставке</h2>
        <?php echo Form::open(['url' => '/checkout', 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo Form::label('name','Ваше имя:'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('address','Адрес доставки:'); ?>

            <?php echo Form::text('address', null, ['class'=>'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('phone','Телефон:'); ?>

            <?php echo Form::text('phone', null, ['class'=>'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::submit('Заказать', ['class'=>'btn btn-primary form-control']); ?>

        </div>
        <?php echo Form::close(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>