<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'zlUndLHvlke3Vmtv+y3+1pven7AzSpWAaoMuh9k8zF+5BwykRdgW7eyPfu8frPzIg9cunqeTGHicf5XTpqjbm5Wu0b/2XVknQtmUXPF8I6APyK2au7CjtRdOSb377cTXcWWbNPq8K2xdCzGPF6mIdQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			
			// Get text sent
			//$text = $event['source']['userId'];
			$text ="sdsdfsf";
			$text1 ="2125";
			
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			
			if ($event['message']['text'] == "Hi"||$event['message']['text'] == "hi")
			{
			$messages = [
				'type' => 'text',
			        'text' => "Hi"
			];
			}
			else if ($event['message']['text'] == "Hello"||$event['message']['text'] == "ไง")
			{
			$messages = [
				'type' => 'text',
			        'text' => "สวัสดี"
			];
			}
			else if ($event['message']['text'] == "หิว")
			{
			$messages = [
				'type' => 'text',
			        'text' => "แดกสิครับ"
			];
			}
			else if ($event['message']['text'] == "SAP-Fiori I")
			{
			$messages = [
				'type' => 'text',
			        'text' => "ไม่สามารถใช้ SAP-Fiori ผ่าน Internet explorer ได้ ให้เปลี่ยนใช้ google chrome แทนครับ"
			];
			}
			else if ($event['message']['text'] == "แก้ว")
			{
			$messages = [
				'type' => 'text',
			        'text' => "หนุ่มร่างถ่วม"
			];
			}
			else if ($event['message']['text'] == "unable to find customer location")
			{
			$messages = [
				'type' => 'text',
			        'text' => "กรณีที่ไม่สามารถหาที่อยู่ลูกค้าได้ ให้ทำการใส่ข้อมูล latitude และ longtitude ของลูกค้าใน customer master ด้วยครับ"
			];
			}
			else if ($event['message']['text'] == "change queue date")
			{
			$messages = [
				'type' => 'text',
			        'text' => "กรณีที่ต้องการยกเลิกการจัดส่ง ให้ยกเลิก queue เดิม แล้วทำการจอง queue ใหม่ด้วยครับ"
			];
			}
			
			else if ($event['message']['text'] == "หิวมาก")
			{	
                        $messages = [
	 			'type' => 'image',
			        'originalContentUrl' => "https://www.knorr.com/content/dam/unilever/knorr_world/global/other_foods/all/type_of_dishes-international_dishes-hero_image-861954.jpg",
	  			'previewImageUrl' => "https://www.knorr.com/content/dam/unilever/knorr_world/global/other_foods/all/type_of_dishes-international_dishes-hero_image-861954.jpg"
			];
			}
			
			

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
