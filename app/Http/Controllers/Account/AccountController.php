<?php
declare(strict_types=1);
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AccountController extends Controller
{
    /**
     * Return account index
     */
    public function index(): View
    {
        return view('account.index', ['title' => 'Account']);
    }
}
