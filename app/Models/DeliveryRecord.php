<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRecord extends Model
{
    use HasFactory;

    protected $table = 'delivery_records'; // 如果表名不是默认的表名
    protected $primaryKey = 'id'; // 如果主键不是默认的主键
    public function deliveryDetails()
    {
        return $this->hasMany(DeliveryDetail::class);
    }

}
