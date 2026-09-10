<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * Return admin painel view
     */
    public function index(): View
    {
        return view('admin.index', ['title' => 'Admin']);
    }
}