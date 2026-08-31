<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @return  Illuminate\Contracts\View::class
     */
    public function index(): View
    {
        return view('home', ['title' => 'Home']);
    }
}  
