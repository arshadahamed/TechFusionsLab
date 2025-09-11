<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class FrontendController extends Controller
{
    public function team()
    {
        return view('home.team.team_page');
    }
    public function about()
    {
        return view('home.about.about_page');
    }

    public function service()
    {
        return view('home.service.service_page');
    }

    public function contact()
    {
        return view('home.contact.contact_page');
    }

    public function sendContact(Request $request)
    {
       $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contactData = $request->only('name', 'email', 'message');

        // Save contact with unread notification
        $contact = Contact::create([
            'name'    => $contactData['name'],
            'email'   => $contactData['email'],
            'message' => $contactData['message'],
            'is_read' => false,
        ]);

        // Send email
        Mail::to('arshadpayoneer@gmail.com')->send(new ContactMail($contactData));

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function getNotifications()
    {
        $notifications = Contact::where('is_read', false)->latest()->take(5)->get();
        return response()->json([
            'count' => $notifications->count(),
            'data'  => $notifications
        ]);
    }

}
