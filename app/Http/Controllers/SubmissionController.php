<?php

namespace App\Http\Controllers;

use App\DTO\SubmissionDTO;
use App\Http\Requests\SubmissionRequest;
use App\Jobs\StoreSubmissionJob;
use Illuminate\Http\Response;

class SubmissionController extends Controller
{
    public function store(SubmissionRequest $request): Response
    {
        dispatch(new StoreSubmissionJob(SubmissionDTO::fromRequest($request)));

        return response(null, 200);
    }
}
