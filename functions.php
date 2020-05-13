<?php

  function valid() {
    $request_from_telegram = false;
      if(isset($_POST)) {

        $data = file_get_contents("php://input");
          if (json_decode($data) != null)
            $request_from_telegram = json_decode($data,1);
      }
    return $request_from_telegram;
  } 

  function sendMessage($chat_id,$text,$markup=null) { 
      if (isset($chat_id)) { 
        return get($GLOBALS['url'].'sendMessage?chat_id='.$chat_id.'&text='.urlencode($text).'&reply_markup='.$markup.'&parse_mode=Markdown'); 
      } 
  } 

  function get($url) { 
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    $data = curl_exec($ch); 
    curl_close($ch); 
    return $data; 
  } 

?>