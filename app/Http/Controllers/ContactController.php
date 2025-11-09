<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $to = config('mail.from.address') ?: 'admin@tempelaras.local';

        try {
            $subject = '[Contact] ' . ($data['subject'] ?? 'Νέο μήνυμα');
            $body = "Όνομα: {$data['name']}\nEmail: {$data['email']}\nΤηλέφωνο: " . ($data['phone'] ?? '-') . "\n\nΜήνυμα:\n{$data['message']}";

            Mail::raw($body, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
            });
        } catch (\Throwable $e) {
            Log::error('Contact mail failed: ' . $e->getMessage(), ['exception' => $e]);
        }

        return back()->with('status', 'contact-sent');
    }
}

