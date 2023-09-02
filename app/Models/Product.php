<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','description'];

    public static function saveBasicInfo($product, $request):object
    {
        $product->name = $request->name;
        $product->slug = str($request->name)->slug();
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return $product;
    }
    public static function newProduct($request):object
    {
        return self::saveBasicInfo(new self(), $request);
    }
}
