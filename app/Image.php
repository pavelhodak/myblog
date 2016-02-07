<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function article() {
        return $this->belongsTo('App\Article');
    }
    protected $fillable = [
        'article_id',
        'image'
    ];
}
