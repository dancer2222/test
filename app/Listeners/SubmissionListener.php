<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class SubmissionListener
{
    public function handle(object $event): void
    {
        $submission = $event->submission;
        $message = 'Submission with name - '
        . $submission->name
        . ' and email - '
        . $submission->email
        . ' was stored';
        echo $message;

        Log::info('store', [$message]);
    }
}
