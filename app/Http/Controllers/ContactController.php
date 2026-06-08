<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function send()
    {
        request()->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'email' => auth()->user()->email,
            'subject' => request('subject'),
            'message' => request('message'),
        ];
        $adminEmails = User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->pluck('email')->toArray();

        Mail::to($adminEmails)
            ->send(new ContactMessageMail($data));
        return back()->with('success', 'Message sent successfully!');
    }
}
