<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //show-contact-form
    public function showContactForm()
    {
        return view('contact');
    }

    // store-contact-form
    public function store(Request $request)
    {
        // Validate the request data
        $formField = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'country' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Store the contact form data in the database or send an email
        Contact::create($formField);

        // Send email
        // Mail::to('skyllaxtechnology@gmail.com')->send(new ContactMail($formField));


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
