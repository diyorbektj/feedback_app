<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public static function sendTelegram(string $method, array $data)
    {
        $response = Http::post('https://api.telegram.org/bot'.config("app.BOT_TOKEN").'/'.$method, $data);
        return $response->json();
    }
    public static function sendMessage($data)
    {
        return self::sendTelegram('sendMessage', $data);
    }
    public static function sendPhoto(array $data)
    {
        return self::sendTelegram('sendPhoto', $data);
    }
}
