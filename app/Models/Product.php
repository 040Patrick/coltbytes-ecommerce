<?php
declare(strict_types=1);
namespace App\Models;

use App\Filters\Product\ProductFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'image',
        'description',
        'price',
        'stock'
    ];

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->BelongsToMany(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Filter
     */
    public static function filter(Request $request)
    {
        $OperatorFilter = (new ProductFilter)->filter($request);

        $query = Product::query();

        if($OperatorFilter['arrayIn'])
        {
            foreach($OperatorFilter['arrayIn'] as $filter)
            {
                $query->where(...$filter);
            }
        }

        if($OperatorFilter['array'])
        {
            $query->where(...$OperatorFilter['array']);
        }

        return $query;
    }
}
