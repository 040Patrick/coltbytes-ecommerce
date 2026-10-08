<?php 
declare(strict_types=1);

namespace App\Filters;

use Exception;
use Illuminate\Http\Request;

abstract class Filter
{
    public array $allowedOperators = [];
    public array $translatedOperator = [];

    public function filter(Request $request): array
    {
        $array = [];
        $arrayIn = [];

        $fieldOperator = $request->except(['search', 'page', 'category', 'status']);

        foreach($fieldOperator as $field => $operators)
        {
            if(!isset($this->allowedOperators[$field]))
            {
                throw new Exception("AllowedOperators does not have field: {$field}");
            }

            if(is_array($operators))
            {
                foreach($operators as $operator => $value)
                {
                    if(!isset($this->translatedOperator[$operator]))
                    {
                        throw new Exception("TranslatedOperator does not have operator: {$operator}");
                    }

                    $arrayIn[] = [
                        $field,
                        $this->translatedOperator[$operator],
                        $value
                    ];
                }
            }
            else 
            {
                $array = [
                    $field,
                    $operators
                ];
            }
        }

        return [
            'arrayIn' => $arrayIn,
            'array' => $array
        ];
    }
}