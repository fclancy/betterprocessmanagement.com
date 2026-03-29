<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;

class ContactController extends Controller
{
    /**
     * Handle contact form submission.
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
            'honeypot' => 'nullable|string|max:0', // Simple spam trap
        ]);

        // Check honeypot - if filled, silently reject
        if (!empty($request->input('honeypot'))) {
            return back()->with('success', 'Message sent successfully!')->withInput($request->except('message', 'name', 'email', 'company', 'phone', 'subject'));
        }

        // Create submission record
        $submission = ContactSubmission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Send email notification (enqueue in production, send synchronously here)
        try {
            Mail::to('info@betterprocessmanagement.com')
                ->send(new ContactFormSubmission($submission));
        } catch (\Exception $e) {
            \Log::error('Contact form email failed: ' . $e->getMessage());
            // Continue - don't fail the submission due to email issues
        }

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message! We will get back to you within 24 hours.')
            ->withInput($request->except('message', 'name', 'email', 'company', 'phone', 'subject'));
    }
}
