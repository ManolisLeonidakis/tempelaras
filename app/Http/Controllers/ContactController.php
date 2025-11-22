<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\User;
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

        $to = config('mail.from.address') ?: 'contact@fixado.gr';

        try {
            $subject = '[Contact] ' . ($data['subject'] ?? 'Νέο μήνυμα');
            $body = "Όνομα: {$data['name']}\nEmail: {$data['email']}\nΤηλέφωνο: " . ($data['phone'] ?? '-') . "\n\nΜήνυμα:\n{$data['message']}";

            Mail::raw($body, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
            });
        }
        catch (\Throwable $e) {
            Log::error('Contact mail failed: ' . $e->getMessage(), ['exception' => $e]);
        }

        return back()->with('status', 'contact-sent');
    }

    /**
     * Handle contact form submission for professionals.
     */
    public function sendToProfessional(ContactRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        try {
            $subject = '[Επικοινωνία] Νέο μήνυμα από πελάτη';
            $body = "Όνομα: {$data['name']}\nEmail: {$data['email']}\nΤηλέφωνο: " . ($data['phone'] ?? '-') . "\n\nΜήνυμα:\n{$data['message']}\n\nΕπαγγελματίας: {$user->name}";

            Mail::raw($body, function ($message) use ($user, $subject) {
                $message->to($user->email)->subject($subject);
            });
        }
        catch (\Throwable $e) {
            Log::error('Professional contact mail failed: ' . $e->getMessage(), ['exception' => $e]);

            return back()->with('error', 'Υπήρξε πρόβλημα με την αποστολή του μηνύματος.');
        }

        return back()->with('status', 'contact-sent');
    }
}
