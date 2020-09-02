<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'note',
        'final_total',
        'discount_amount',
        'discount_type_id',
        'grand_total',
        'paid_total',
        'due_total',
        'status',
        'payment_status',
        'delivery_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->hasOne(OrderAddress::class);
    }

    public function delivery()
    {
        return $this->hasOne(OrderDelivery::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function printStatus()
    {
        if ($this->status === 'ordered') {
            $html = "<span class='badge badge-warning'>Ordered</span>";
        } elseif ($this->status === 'seen') {
            $html = "<span class='badge badge-info'>Seen</span>";
        }
        return $html;
    }
}
