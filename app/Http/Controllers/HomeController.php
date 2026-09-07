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
        $products =  Product::query()->when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->with('images')->paginate(10);
            
    
        return view('home', ['title' => 'Home', 'products' => $products,]);
    }
}  
