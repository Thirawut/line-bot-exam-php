<?php



require "vendor/autoload.php";

$access_token = 'zlUndLHvlke3Vmtv+y3+1pven7AzSpWAaoMuh9k8zF+5BwykRdgW7eyPfu8frPzIg9cunqeTGHicf5XTpqjbm5Wu0b/2XVknQtmUXPF8I6APyK2au7CjtRdOSb377cTXcWWbNPq8K2xdCzGPF6mIdQdB04t89/1O/w1cDnyilFU=';

$channelSecret = '76efa83038bec46527ca9c7b2bab9fb2';

$pushID = 'U331fc4478f993d78a0777a994df0080a';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







