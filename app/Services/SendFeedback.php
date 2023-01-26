<?php

namespace App\Services;

use App\DTO\CreateFeedbackDTO;
use App\Http\Requests\CreateFeedbackRequest;
use App\Jobs\SendEmail;
use App\Models\Feedback;
use Database\Factories\FeedbackFactory;

class SendFeedback
{
    public function sendFeedback(CreateFeedbackRequest $request)
    {
        Feedback::query()->create(CreateFeedbackDTO::toArray($request->validated()));
        dispatch(new SendEmail($request->validated()));
        return 1;
    }
}
