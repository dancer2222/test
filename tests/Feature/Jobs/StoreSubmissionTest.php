<?php

namespace Tests\Feature\Jobs;

use App\DTO\SubmissionDTO;
use App\Jobs\StoreSubmissionJob;
use App\Models\Submission;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StoreSubmissionTest extends TestCase
{
    use DispatchesJobs, DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function  testStoreSubmissionTest()
    {
        $name = fake()->name();
        $email = fake()->unique()->safeEmail();
        $message = fake()->sentence;
        $dto = new SubmissionDTO($name, $email, $message);

        dispatch(new StoreSubmissionJob($dto));
        $model = Submission::first();

        $this->assertStringContainsString($name, $model->name);
        $this->assertStringContainsString($email, $model->email);
        $secondModel = new Submission();
        $secondModel->fillByDto($dto);
        $this->assertEquals($model->getFillable(),$secondModel->getFillable());
    }
}
