<?php

namespace App\DTO;

use App\Http\Requests\SubmissionRequest;

class SubmissionDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message
    ) {}

    public static function fromRequest(SubmissionRequest $request): static
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            message: $request->validated('message'),
        );
    }
}
