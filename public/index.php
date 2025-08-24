<?php
// Simple PHP bot for testing on Heroku

$token = "7610698647:AAGc0vKL1iYTchSGJowB7FzlLWhwrPTg3V4";

// قراءة البيانات من تيليجرام
$update = json_decode(file_get_contents("php://input"), true);

if(isset($update["message"]["text"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];

    // تحقق من أمر /start
    if($message == "/start") {
        $response_text = "👋 مرحباً! البوت جاهز للتجربة على هيروكو.";
    } else {
        $response_text = "You said: " . $message;
    }

    // إرسال الرد
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($response_text));
}

echo "Bot is running!";
