<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\GenericMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class MailController extends Controller
{
    public function __invoke(SendMailRequest $request): RedirectResponse
    {
        try {
            $mail = new GenericMail(
                name: $request->recipientName,
                text: $request->text,
            );

            $mail->subject($request->subject);

            if (($attachment = $request->file('attachment')) && $request->user()->can('attach files')) {
                $mail->attachData(
                    $attachment->getContent(),
                    $attachment->getClientOriginalName(),
                );
            }

            Mail::to($request->recipientEmail)
                ->send($mail);
        } catch (Throwable $e) {
            report($e);
        }

        return Redirect::route('dashboard')
            ->with('success', 'Mail sent successfully!');
    }
}
