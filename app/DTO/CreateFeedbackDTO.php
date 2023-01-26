<?php

namespace App\DTO;

class CreateFeedbackDTO
{
    public static function toArray(array $data)
    {
        return [
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'message' => $data['message']
        ];
    }
}
