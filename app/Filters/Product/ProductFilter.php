<?php 
declare(strict_types=1);

namespace App\Filters\Product;

use App\Filters\Filter;
use Illuminate\Http\Request;

class ProductFilter extends Filter
{
    public array $allowedOperators = [
        'name' => ['eq', 'ne', 'in'],
        'slug' => ['eq', 'ne', 'in'],
        'price' => ['gt', 'gte', 'lt', 'lte', 'in', 'eq', 'ne'],
        'stock' => ['gt', 'gte', 'lt', 'lte', 'in', 'eq', 'ne'],
    ];
    
    public array $translatedOperator = [
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'eq' => '=',
        'ne' => '!=',
        'in' => 'in'
    ];
}