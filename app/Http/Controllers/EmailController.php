<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function sendRegistrationEmail(Request $request)
    {
        $user = $request->input('user');
        $event = $request->input('event');

        $emailData = [
            'name'  => $user['name'],
            'email' => $user['email'],
            'eventTitle' => $event['title'],
            'eventStartDate' => $event['start_date'],
            'eventEndDate' => $event['end_date'],
        ];

        try {
            Mail::send('emails.registration', $emailData, function($message) use ($emailData) {
                $message->to($emailData['email'], $emailData['name'])->subject('Inscrição no evento: ' . $emailData['eventTitle']);
            });

            return response()->json(['message' => 'Email enviado com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Falha ao enviar o email.'], 500);
        }
    }

    public function sendUnregistrationEmail(Request $request)
    {
        $user = $request->input('user');
        $event = $request->input('event');

        $emailData = [
            'name'  => $user['name'],
            'email' => $user['email'],
            'eventTitle' => $event['title']
        ];

        try {
            Mail::send('emails.unregistration', $emailData, function($message) use ($emailData) {
                $message->to($emailData['email'], $emailData['name'])->subject('Desinscrição do evento: ' . $emailData['eventTitle']);
            });

            return response()->json(['message' => 'Email enviado com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Falha ao enviar o email.'], 500);
        }
    }

    public function sendCheckinEmail(Request $request)
    {
        $user = $request->input('user');
        $event = $request->input('event');

        $emailData = [
            'name' => $user['name'],
            'email' => $user['email'],
            'eventTitle' => $event['title'],
            'eventStartDate' => $event['start_date'],
            'eventEndDate' => $event['end_date'],
        ];

        try {
            Mail::send('emails.checkin', $emailData, function($message) use ($emailData) {
                $message->to($emailData['email'], $emailData['name'])
                        ->subject('Check-in no Evento: ' . $emailData['eventTitle']);
            });

            return response()->json(['message' => 'Email de check-in enviado com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Falha ao enviar o email de check-in.'], 500);
        }
    }
}