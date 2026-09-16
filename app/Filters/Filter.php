<?php 
declare(strict_types=1);
namespace App\Filters;

use Exception;
use Illuminate\Http\Request;

abstract class Filter
{
    public array $allowedOperators = [];
    public array $translatedOperators = [];

    public function filter(Request $request): array 
    {
        $array = [];
        $arrayIn = [];

        $OperatorFilters = $request->except('search');

        foreach($OperatorFilters as $field => $operators)
        {
            if(!isset($field, $this->allowedOperators[$field]))
            {
                throw new Exception("allowedOperators does not have {$field}");
            }

            if(is_array($operators))
            {
                foreach($operators as $operator => $value)
                {
                    $arrayIn[] = [
                        $field, 
                        $this->translatedOperators[$operator],
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
            'array' => $array,
            'arrayIn' => $arrayIn
        ];
    }
}