@extends('app')
@section('content')
    <a href="/basket" class=" navbar-link navbar-text navbar-right">
        <span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span>
        <span class="badge pull-right count_order">0</span>
    </a>
    @if(count($orders)==0)
        Your basket is empty
    @else
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
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->article_id}}</td>
                    <td>@if($order->image != '') <img height=50 src="{{$order->image}}"> @endif</td>
                    <td>{{$order->title}}</td>
                    <td>{{$order->price}}</td>
                    <td><input class="total" type="number" step="1" min="1" value="{{$order->amount}}"/></td>
                    <td class="price_order">{{$order->price*$order->amount}}</td>
                    <td><button type="button" class="btn btn-danger del_order">Удалить</button></td>
                </tr>
                <?php $total_cost += $order->price * $order->amount; ?>
            @endforeach
        </table>
        <p>Итого к оплате: <span style="font-size: 2em;" class="total_cost">{{ $total_cost }}</span></p>

        <hr>
        <h2>Информация о доставке</h2>
        {!! Form::open(['url' => '/checkout', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name','Ваше имя:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address','Адрес доставки:') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone','Телефон:') !!}
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Заказать', ['class'=>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    @endif
@endsection