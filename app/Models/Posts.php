<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    // điều chỉnh kết nối đến bảng khi đặt tên nhầm bảng 
    // protected $table = 'ten bang muon ket noi';

    // // khai báo lại tên khóa chính
    // protected $primaryKey = 'tên khóa chính khác';

    // //khai báo kiểu dữ liệu cho kháo chính mới
    // protected $keyType = 'kieu du lieu';

    // //tăng tự động cho khóa chính
    // public $incrementing = false;

    // //điều chỉnh kết nối db
    // protected $connection ='ten ket noi';

protected $fillable = ['title', 'content'];

}
