<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Categorie;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tshirt_images";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    public $timestamps = true;

    protected $fillable = ["customer_id", "category_id", "name", "description", "image_url", "extra_info_json"
    ];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'id', 'category_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id');
    }

    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'tshirt_image_id', 'id');
    }
}
