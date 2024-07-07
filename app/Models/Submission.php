<?php

namespace App\Models;

use App\DTO\SubmissionDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';
    protected $fillable = ['name', 'email', 'message'];

    public function fillByDto(SubmissionDTO $submissionDTO): Submission
    {
        $this->fill([
            'name' => $submissionDTO->name,
            'email' => $submissionDTO->email,
            'message'  => $submissionDTO->message,
        ]);

        return $this;
    }
}
