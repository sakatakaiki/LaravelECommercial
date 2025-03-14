<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Tên bảng trong database

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'price',
        'quantity',
        'category_id',
        'view'
    ]; // Danh sách cột có thể insert/update

    const UPDATED_AT = null;
    public $timestamps = true;


    public static function getTopViewedProducts($limit = 6)
    {
        return self::orderByDesc('view')->take($limit)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
