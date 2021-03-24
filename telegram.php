<?php
/* https://api.telegram.org/bot1690876248:AAElikUKRilawmEFl9r9Pe8pMZfY_5LZ85w/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
$rest_json = file_get_contents("php://input");
$data = json_decode($rest_json, true);


$name = $data['name'];
$contact = $data['contact'];
$text = $data['text'];
$token = "1690876248:AAElikUKRilawmEFl9r9Pe8pMZfY_5LZ85w";
$chat_id = "-534208471";
$txt="";
$arr = array(
    'Имя пользователя: ' => $name,
    'Телефон: ' => $contact,
    'Text' => $text,
    'Дата заказа: ' => date("m.d.Y")
);
    $txt = implode("%0A",$arr);
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
    header("Location: /write/sent"); /* Redirect browser */
    exit();
} else {
    echo "Error";
}
?>