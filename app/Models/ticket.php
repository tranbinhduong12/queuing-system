<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'stt',
        'name_user',
        'phone',
        'email',
        'expires_at',
        'device_id',
        'service_id',
        'status'
    ];

    public function status(){
        // thời gian hiện tại 
        $now = date('Y-m-d H:i:s');
        if($this->status == 0){
            return "Đã bỏ qua";
        }else if ($now > $this->expires_at){
            return "Hết hạn";
        }else if ($this->status == 1){
            return "Đang chờ";
        }else if ($this->status == 2){
            return "Đã sử dụng";
        }
    }

    public function status_color(){
        $now = date('Y-m-d H:i:s');
        if($this->status == 0 || $now > $this->expires_at){
            return "#E73F3F";
        }else if ($this->status == 1){
            return "#4277FF";
        }else if ($this->status == 2){
            return "#7E7D88";
        }
    }
}
