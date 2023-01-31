<?php

namespace App\Factory;

use App\DTO\CreateFeedbackDTO;
use App\Jobs\SendEmail;
use App\Models\Feedback;

class SendFeedback implements SendFeedbackInterface
{

    public function send($request)
    {
        Feedback::query()->create(CreateFeedbackDTO::toArray($request->validated()));
        dispatch(new SendEmail($request->validated()));
    }
}
