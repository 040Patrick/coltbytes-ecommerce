<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @Relations
     */
    public function products(): BelongsToMany
    {
        return $this->BelongsToMany(product::class);
    }

}
