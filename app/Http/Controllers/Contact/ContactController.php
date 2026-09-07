<?php
declare(strict_types=1);
namespace App\Http\Controllers\Contact;

use App\Events\Email\ReceiveContactEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /** 
     * Return contact view
     */
    public function index(): View
    {
        return view('contact.index', ['title' => 'Contact']);
    }

    /**
     * Send contact email
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        ReceiveContactEmail::dispatch($data);

        return back()->with(['contact' => 'Contact Email has been sent.']);
    }
}
