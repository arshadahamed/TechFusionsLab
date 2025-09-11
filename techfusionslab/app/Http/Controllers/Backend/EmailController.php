<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class EmailController extends Controller
{
    public function AllEmails() {
        $emails = Contact::latest()->get();
        return view('admin.backend.email.all_email',compact('emails'));
    }
    public function DeleteEmail($id) {
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Email Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
