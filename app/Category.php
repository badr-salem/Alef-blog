<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function articles(){
      return $this->belongsToMany(Article::class , 'articles_categories',
    'category_id',
    'article_id');
    }
}
