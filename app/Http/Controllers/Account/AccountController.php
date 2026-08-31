<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adresses\StoreAdressesRequest;
use App\Http\Requests\Phone\UpdatePhoneRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Countries;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
