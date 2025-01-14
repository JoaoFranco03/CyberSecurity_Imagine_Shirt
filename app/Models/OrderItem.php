<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\Order;
use App\Models\Color;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = "order_items";
    public $timestamps = false;
    protected $fillable = ["order_id", "tshirt_image_id", "color_code",
                            "size", "qty", "unit_price","sub_total"]; //acho que unit price tem de vir da DB e subTotal o php calcula

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_code', 'code')->withTrashed(); //TODO --> check if it can be HasOne instead of BelongsTo(dont work with belongsTo)
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function tshirtImage(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'tshirt_image_id', 'id')->withTrashed();
    }
}
