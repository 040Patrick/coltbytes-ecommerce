<?php 
declare(strict_types=1);
namespace App\Filters\Product;

use App\Filters\Filter;

class ProductFilter extends Filter
{
    public array $allowedOperators = [
        'name' => ['eq', 'ne', 'in'],
        'slug' => ['eq', 'ne', 'in'],
        'price' => ['gt', 'gte', 'lt', 'lte', 'eq', 'ne', 'in'],
        'stock' => ['gt', 'gte', 'lt', 'lte', 'eq', 'ne', 'in'],
        'created_at' => ['gt', 'gte', 'lt', 'lte', 'eq']
    ];

    public array $translatedOperators = [
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'eq' => '=',
        'ne' => '!=',
        'in' => 'in'
    ];
}