<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $user_id
 * @property OrderStatus $status
 * @property double $total
 * @property int $item_count
 * @property int $is_paid
 * @property PaymentMethod $payment_method
 * @property string $notes
 */
class Order extends Model
{
    use HasFactory;

    protected $table ='orders';
    protected $fillable = [
        'user_id', 'status', 'is_paid', 'payment_method', 'notes'
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'payment_method' => PaymentMethod::class,
        'is_paid' => 'boolean'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'order_products',
            'order_id',
            'product_id'
        );
    }
}
