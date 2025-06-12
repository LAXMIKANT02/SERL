<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;
use App\Models\Contact;
use App\Mail\EmergencyAlertMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmergencyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'message' => 'nullable|string',
        ]);

        $emergency = Emergency::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'message' => $request->message,
            'status' => 'active',
        ]);

        Log::info('Sending Emergency Email', [
            'type' => $emergency->type,
            'latitude' => $emergency->latitude,
            'longitude' => $emergency->longitude,
            'message' => $emergency->message,
        ]);

        try {
            if ($request->type === 'secure_contact') {
                // Send email to all user-defined emergency contacts
                $contacts = Contact::where('user_id', Auth::id())->get();

                foreach ($contacts as $contact) {
                    Mail::to($contact->email)->send(new EmergencyAlertMail($emergency));
                }
            } else {
                // Hardcoded department emails (replace with real ones if needed)
                $toEmail = match ($request->type) {
                    'fire' => 'fire@example.com',
                    'medical' => 'medical@example.com',
                    'police' => 'police@example.com',
                    default => 'test@example.com',
                };

                Mail::to($toEmail)->send(new EmergencyAlertMail($emergency));
            }

            return response()->json(['status' => 'Emergency reported and email sent successfully']);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());

            return response()->json([
                'status' => 'Emergency reported but failed to send email',
                'error' => $e->getMessage()
            ]);
        }
    }
}
