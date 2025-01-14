<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "colors";

    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $timestamps = false;
    public $incrementing = false;

    function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'color_code', 'code');
    }
}
