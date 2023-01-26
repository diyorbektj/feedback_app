<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedbackRequest;
use App\Services\SendFeedback;
use Database\Factories\FeedbackFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factory;
class FeedbackController extends Controller
{

    private SendFeedback $sendFeedback;

    public function __construct(SendFeedback $sendFeedback)
    {
        $this->sendFeedback = $sendFeedback;
    }

    public function createFeedback(CreateFeedbackRequest $request)
    {
        $this->sendFeedback->sendFeedback($request);
        return response()->json(["message" => "Feedback submitted successfully"], 201);
    }
}
