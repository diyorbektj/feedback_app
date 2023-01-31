<?php

namespace App\Http\Controllers;

use App\Factory\SendFeedback;
use App\Http\Requests\CreateFeedbackRequest;
class FeedbackController extends Controller
{

    public function createFeedback(CreateFeedbackRequest $request)
    {
        $sendFeedback = new SendFeedback();
        $sendFeedback->send($request);
        return response()->json(["message" => "Feedback submitted successfully"], 201);
    }
}
