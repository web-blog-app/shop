<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $guarded = [];
   

    protected $table = 'category';

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

      public static function getCategories() {        
        $arr = self::orderBy('name')->get();

        return self::buildTree($arr, 0);
}


public static function buildTree($arr, $pid = 0) {
       
        $found = $arr->filter(function($item) use ($pid){return $item->parent_id == $pid; });
        
        foreach ($found as $key => $cat) {
            $sub = self::buildTree($arr, $cat->id);
            $cat->sub = $sub;
            }

        return $found;
    }
   

}
