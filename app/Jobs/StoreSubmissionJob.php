<?php

namespace App\Jobs;

use App\DTO\SubmissionDTO;
use App\Events\SubmissionSaved;
use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreSubmissionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly SubmissionDTO $submissionDTO)
    {
    }

    public function handle(Submission $submission): void
    {
        $submission->fillByDto($this->submissionDTO);
        if ($submission->save()) {
            event(new SubmissionSaved($submission));
        }
    }

    public function failed($exception): void
    {
        $exception->getMessage();
    }
}
