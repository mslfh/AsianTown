<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    protected $fillable = ['purchaserId', 'purchaserName', 'productId', 'productName', 'number'];

    public function deliveryRecord()
    {
        return $this->belongsTo(DeliveryRecord::class,'delivery_record_id');
    }
}
