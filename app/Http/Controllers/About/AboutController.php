<?php
declare(strict_types=1);
namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * Return about-us view
     */
    public function index(): View
    {
       return view('about.index', ['title' => 'About']);
    }
}
