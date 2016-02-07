<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersToArticles extends Model
{
    protected $table = 'orders_to_articles';
    protected $fillable = ['order_id', 'article_id', 'price', 'quantity'];

}
