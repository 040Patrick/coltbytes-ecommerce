<?php

namespace App\Http\Controllers\Contact;

use App\Events\Email\ReceiveContactEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;

class ContactController extends Controller
{
    /** 
     * Return contact view
     */
    public function index()
    {
        return view('contact.index', ['title' => 'Contact']);
    }

    /**
     * Send contact email
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        ReceiveContactEmail::dispatch($data);

        return back()->with(['contact' => 'Contact Email has been sent.']);
    }
}
