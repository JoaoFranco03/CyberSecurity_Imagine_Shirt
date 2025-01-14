<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\OrderItem;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'status', 'customer_id', 'date', 'total_price','nif','address','payment_ref','payment_type', 'notes'

    ];


    function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id')->withTrashed();
    }
}
