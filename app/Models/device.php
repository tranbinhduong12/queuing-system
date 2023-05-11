<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;
    protected $table = 'devices';

    protected $fillable = [
        'id',
        'name',
        'username',
        'password',
        'ip',
        'service_ids',
        'type',
        'online'
    ];
    public $incrementing = false;

    public function services()
    {
        // tách từng phần tử service_ids thành mảng các id
        $service_ids = explode(',', $this->service_ids);
        // lấy ra các service có id nằm trong mảng $service_ids
        $services = service::whereIn('id', $service_ids)->get();
        // chuyển mảng $services thành chuỗi các tên service ngăn cách nhau bởi dấu phẩy
        $service_names = '';
        foreach ($services as $service) {
            $service_names .= $service->name . ', ';
        }
        // xóa dấu phẩy cuối cùng
        $service_names = substr($service_names, 0, -2);
        return [$service_names, $services];
    }
}
