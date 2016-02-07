<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Image;
use App\Order;
use App\OrdersToArticles;

class BasketController extends Controller
{
    public function show()
    {
        if(isset($_COOKIE['basket']))
        {
            $orders = $_COOKIE['basket'];
            $orders=json_decode($orders);
            foreach($orders as $order)
            {
                $article = Article::findOrFail($order->article_id);
                $order->price = $article->price;
                $order->title = $article->title;
                $order->image = Image::where('article_id', '=', $article->id)->pluck('image')->first();
                if(!$order->image) $order->image='';
            }
        }
        else
        {
            $orders=[];
        }
        return view('basket',['orders'=>$orders]);
    }

    public function checkout(Request $request){
        if(isset($_COOKIE['basket']))
        {
            $entries = $_COOKIE['basket'];
            $entries = json_decode($entries);
        }
        else
        {
            return redirect('/');
        }

        $ids = array_pluck($entries, 'article_id');

        $items = Article::whereIn('id', $ids)->get();//->toArray();
        $items = $items->keyBy('id');

        $order = Order::create(['name' => $request->name, 'address' => $request->address,'phone' => $request->phone]);

        $summary = [];
        $total_cost = 0;

        foreach($entries as $entry)
        {
            OrdersToArticles::create([
                'article_id' => $entry->article_id,
                'order_id' => $order->id,
                'price' => $items->get($entry->article_id)->price,
                'quantity' => $entry->amount
            ]);
            $summary[] = [
                'article_id' => $entry->article_id,
                'title' => $items->get($entry->article_id)->title,
                'price' => $items->get($entry->article_id)->price,
                'amount' => $entry->amount,
            ];
            $total_cost += end($summary)['price'] * end($summary)['amount'];
        }


        setcookie('basket','', 0, '/'); //удаляем куки

        return view('finish_order', ['order' => $order, 'entries' => $summary, 'total' => $total_cost]);

    }
}
