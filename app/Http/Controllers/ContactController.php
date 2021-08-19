<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\UserContacted;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(ContactRequest $request)
    {
        try {
            $request->validated();
            Mail::to(config('app.client_email'))->send(new UserContacted($request->validated()));
        } catch (\Exception $e) {
            return redirect()->route("contacts")->with("error", "Oops, Couldn\'t send email. Try again.");
        }
        return redirect("contacts")->with("success", "Thank you for contacting us!");
    }
}
