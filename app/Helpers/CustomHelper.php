<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class CustomHelper
{
    public static function base_url()
    {
        return config('app.url');
    }

    public static function getData($table)
    {
        return DB::table($table)->get();
    }

    public static function getProductWithCategory()
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('products.*', 'categories.category_name')
            ->get();
    }

    public static function getProductByName($name)
    {
        return DB::table('products')->where('product_name', $name)->first();
    }

    public static function getProductByCategory($cat)
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('categories.category_name', $cat)
            ->select('products.*', 'categories.category_name')
            ->get();
    }

    // Tambahkan fungsi lainnya sesuai dengan kebutuhan
}
