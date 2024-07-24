<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable=['id', 'name', 'price', 'quantity', 'image', 'category_id', 'status', 'created_at', 'updated_at'];
    public $timestaps = false;

    public function loadAllCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function loadDataWithPager(){
        //chua co tim kiem
        //co truy van kem phan trang
        //ORM
        $query =Product::
        with('loadAllCategory')
        ->latest('id')
        ->paginate(10);

        return $query;

    }
}
