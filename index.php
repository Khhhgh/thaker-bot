<?php
// Simple PHP bot for testing on Heroku

// ضع هنا توكن البوت مباشرة
$token = "7610698647:AAGc0vKL1iYTchSGJowB7FzlLWhwrPTg3V4";

// قراءة البيانات من تيليجرام
$update = json_decode(file_get_contents("php://input"), true);

if(isset($update["message"]["text"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];

    $response_text = "You said: " . $message;

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($response_text));
}

echo "Bot is running!";
