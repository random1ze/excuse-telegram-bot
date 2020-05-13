<?php
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');

include('config.php');
include('functions.php');
include('phrases_hi.php');
include('phrases_one.php');
include('phrases_excuses.php');

echo get($url.'setWebhook?url='.$webhook);

if (($json = valid()) == false) {
 exit();
}
  $uid = $json['message']['from']['id'];
  $first_name = $json['message']['from']['first_name'];
//   $username = $json['message']['from']['username'];
  $chat_id = $json['message']['chat']['id'];
  $text = $json['message']['text'];

  switch($text){      
    case '/help':
    case '/help@Mrlongbot':
      $ANSWER = "Добро пожаловать в раздел справки. Просто тыкай */excuse* чтобы получить отмазки.";
    break;
    case '/hi':
    case '/hi@Mrlongbot':
      $ANSWER = $phrases_hi[$rand_phrases_hi].$first_name;
    break;  
    case '/excuse':
    case '/excuse@Mrlongbot':
      $ANSWER = $phrases_one[$rand_phrases_one];
      sendMessage($chat_id,$ANSWER);
      sleep(1);
      $ANSWER = $excuses[$rand_excuses];
    break;    
    case '/start':
    case '/start@Mrlongbot':
        $ANSWER = 'Привет!
Текущий список команд для бота:

        */hi* - приветствие

        */help* - справка

        */excuse* - получить отмазку';
    break;
  }

sendMessage($chat_id,$ANSWER);

?>
