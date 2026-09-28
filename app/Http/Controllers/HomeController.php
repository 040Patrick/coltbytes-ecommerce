<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return  Illuminate\Contracts\View::class
     */
    public function index(Request $request): View
    {
        $products =  (new Product())->filter($request)->when($request->search, function ($query, $search) {
            $query->where('name', 'like', "${search}$");
        })->paginate(5);

        return view('home', ['title' => 'Home', 'products' => $products,]);
    }
}  