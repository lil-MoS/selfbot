<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/ 
ini_set('display_errors', 0);
error_reporting(0);
if(!is_dir('data')) mkdir('data');
if(!file_exists("power.json")){file_put_contents('power.json', '{"power":"on"}');}
if(!file_exists("TimeBiography.json")){file_put_contents('TimeBiography.json', '{"TimeBiography":"off"}');}
if(!file_exists("data/Source_Home.json")){file_put_contents('data/Source_Home.json', '{"GamePlay":"off","TypingAction":"off","AudioAction":"off","VideoAction":"off"}');}
if(!file_exists('data.json')) touch('data.json');if( file_exists('data.json') && (filesize('data.json')/1024) > 0.3) unlink('data.json');
if( file_exists('MadelineProto.log') && (filesize('MadelineProto.log')/1024) > 100) unlink('MadelineProto.log');
function SaveData($data, $filename){$outjson = json_encode($data,true);file_put_contents("$filename",$outjson);}
function closeConnection($message='Source_Home Self Is Running ...'){
 if (php_sapi_name() === 'cli' || isset($GLOBALS['exited'])) {
  return;
 }
    @ob_end_clean();
    header('Connection: close');
    ignore_user_abort(true);
    ob_start();
    echo "$message";
    $size = ob_get_length();
    header("Content-Length: $size");
    header('Content-Type: text/html');
    ob_end_flush();
    flush();
    $GLOBALS['exited'] = true;
}
function shutdown_function($lock)
{
   try {
    $a = fsockopen((isset($_SERVER['HTTPS']) && @$_SERVER['HTTPS'] ? 'tls' : 'tcp').'://'.@$_SERVER['SERVER_NAME'], @$_SERVER['SERVER_PORT']);
    fwrite($a, @$_SERVER['REQUEST_METHOD'].' '.@$_SERVER['REQUEST_URI'].' '.@$_SERVER['SERVER_PROTOCOL']."\r\n".'Host: '.@$_SERVER['SERVER_NAME']."\r\n\r\n");
    flock($lock, LOCK_UN);
    fclose($lock);
} catch(Exception $v){}
}
if (!file_exists('bot.lock')) {
 touch('bot.lock');
}
$lock = fopen('bot.lock', 'r+');
$try = 1;
$locked = false;
while (!$locked) {
 $locked = flock($lock, LOCK_EX | LOCK_NB);
 if (!$locked) {
  closeConnection();
 if ($try++ >= 30) {
 exit;
}
sleep(1);}
}
// Source_Home
// @Source_Home 
if(!is_dir('Copy-SESSION')){
 mkdir('Copy-SESSION');
}
if(!file_exists('madeline.php')){
 copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
date_default_timezone_set('Asia/Tehran');
include_once 'madeline.php';
include_once 'jdf.php';
$settings = [];
$settings['logger']['logger'] = 0;
$settings['serialization']['serialization_interval'] = 1;
$settings['serialization']['cleanup_before_serialization'] = true;
$MadelineProto = new \danog\MadelineProto\API('Source_Home-SESSION.madeline', $settings);
$MadelineProto->start();
class EventHandler extends \danog\MadelineProto\EventHandler {
public function __construct($MadelineProto){
parent::__construct($MadelineProto);
}
public function onUpdateNewChannelMessage($update)
{
 yield $this->onUpdateNewMessage($update);
}
public function onUpdateNewMessage($update){

 if(!file_exists('Copy-SESSION/Source_Home-SESSION.madeline')){
   copy('Source_Home-SESSION.madeline', 'Copy-SESSION/Source_Home-SESSION.madeline');
 }
$time = date("H:i:s");
$from_id = isset($update['message']['from_id']) ? $update['message']['from_id']:'';
  try {
 if(isset($update['message']['message'])){
 $text = $update['message']['message'];
 $msg_id = $update['message']['id'];
 $message = isset($update['message']) ? $update['message']:'';
 $MadelineProto = $this;
 $me = yield $MadelineProto->get_self();
 $admin = $me['id'];
 $chID = yield $MadelineProto->get_info($update);
 $peer = $chID['bot_api_id'];
 $type3 = $chID['type'];
 $Source_Home = json_decode(file_get_contents("data/Source_Home.json"), true);
 $power = json_decode(file_get_contents("power.json"), true);
 $TimeBiography = json_decode(file_get_contents("TimeBiography.json"), true);
    
if(!file_exists('Copy-SESSION/Source_Home-SESSION.madeline')){
   copy('Source_Home-SESSION.madeline', 'Copy-SESSION/Source_Home-SESSION.madeline');
   }
    // Source_Home
// @Source_Home 
 if(file_exists('Source_Home-SESSION.madeline') && filesize('Source_Home-SESSION.madeline')/1024 > 1200){
   unlink('Source_Home-SESSION.madeline.lock');
   unlink('Source_Home-SESSION.madeline');
   copy('Copy-SESSION/Source_Home-SESSION.madeline', 'Source_Home-SESSION.madeline');
   file_get_contents('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);
}
// Source_Home
// @Source_Home 
//---------------------------------
if($message && $Source_Home['GamePlay'] == "on" && $update['_'] == "updateNewChannelMessage"){
$sendMessageGamePlayAction = ['_' => 'sendMessageGamePlayAction'];
yield $this->messages->setTyping(['peer' => $peer, 'action' => $sendMessageGamePlayAction]);
}
if($message && $Source_Home['TypingAction'] == "on" && $update['_'] == "updateNewChannelMessage"){
$sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
yield $this->messages->setTyping(['peer' => $peer, 'action' => $sendMessageTypingAction]);
}
if($message && $Source_Home['AudioAction'] == "on" && $update['_'] == "updateNewChannelMessage"){
$sendMessageRecordAudioAction = ['_' => 'sendMessageRecordAudioAction'];
yield $this->messages->setTyping(['peer' => $peer, 'action' => $sendMessageRecordAudioAction]);
}
if($message && $Source_Home['VideoAction'] == "on" && $update['_'] == "updateNewChannelMessage"){
$sendMessageRecordVideoAction = ['_' => 'sendMessageRecordVideoAction'];
yield $this->messages->setTyping(['peer' => $peer, 'action' => $sendMessageRecordVideoAction]);
}
if($TimeBiography['TimeBiography'] == "on"){
yield $this->account->updateStatus(['offline'=> false]);
yield $this->account->updateProfile(['about' => "$time"]);
}
if($TimeBiography['TimeBiography'] == "off"){
yield $this->account->updateStatus(['offline'=> false]);
yield $this->account->updateProfile(['about' => "😜 بخش تایم بیو خاموش میباشد."]);
}
//---------------------------------
if ($from_id == $admin){
//---------------------------------
	if(preg_match("/^[\/\#\!]?(bot) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(bot) (on|off)$/i", $text, $m);
     $power['power'] = $m[2];
     file_put_contents("power.json", json_encode($power));
     yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑩𝑶𝑻 𝑵𝑶𝑾 𝑰𝑺 $m[2]"]);
}
if(preg_match("/^[\/\#\!]?(GamePlay) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(GamePlay) (on|off)$/i", $text, $m);
     $Source_Home['GamePlay'] = $m[2];
     file_put_contents("data/Source_Home.json", json_encode($Source_Home));
     yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑮𝑨𝑴𝑬𝑷𝑳𝑨𝒀 𝑴𝑶𝑫𝑬 𝑵𝑶𝑾 𝑰𝑺 $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(TypingAction) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(TypingAction) (on|off)$/i", $text, $m);
     $Source_Home['TypingAction'] = $m[2];
     file_put_contents("data/Source_Home.json", json_encode($Source_Home));
     yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑻𝒀𝑷𝑰𝑵𝑮 𝑨𝑪𝑻𝑰𝑶𝑵 𝑴𝑶𝑫𝑬 𝑵𝑶𝑾 𝑰𝑺 $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(AudioAction) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(AudioAction) (on|off)$/i", $text, $m);
     $Source_Home['AudioAction'] = $m[2];
     file_put_contents("data/Source_Home.json", json_encode($Source_Home));
     yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑨𝑼𝑫𝑰𝑶 𝑨𝑪𝑻𝑰𝑶𝑵 𝑴𝑶𝑫𝑬 𝑵𝑶𝑾 𝑰𝑺 $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(VideoAction) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(VideoAction) (on|off)$/i", $text, $m);
     $Source_Home['VideoAction'] = $m[2];
     file_put_contents("data/Source_Home.json", json_encode($Source_Home));
     yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑽𝑰𝑫𝑬𝑶 𝑨𝑪𝑻𝑰𝑶𝑵 𝑴𝑶𝑫𝑬 𝑵𝑶𝑾 𝑰𝑺 $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(TimeBiography) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(TimeBiography) (on|off)$/i", $text, $m);
     $TimeBiography['TimeBiography'] = $m[2];
     file_put_contents("TimeBiography.json", json_encode($TimeBiography));
     yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑻𝑰𝑴𝑬 𝑩𝑰𝑶𝑮𝑹𝑨𝑷𝑯𝒀 𝑵𝑶𝑾 𝑰𝑺 $m[2]"]);
   }
	
if($text == 'help' or $text == '/help'){
    $mem_using = round(memory_get_usage() / 1024 / 1024,1);
    yield $this->messages->sendMessage(['peer' => $peer, 'message' => "
🔍 `Self-robot guide [ Source_Home v1 ]` :

 `/bot`  `on` | `off` 
📕 خاموش و روشن کردن سلف
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
 `ping`
🧤 اطلاع از آنلاینی سلف
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
`TypingAction`  `on` | `off` 
🖋 خاموش و روشن کردن حالت درحال نوشتن
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
 `GamePlay`  `on` | `off` 
🏀 خاموش و روشن کردن حالت درحال بازی
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
`VideoAction`  `on` | `off` 
🎥 خاموش و روشن کردن حالت درحال ضبط ویدیو
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
`AudioAction`  `on` | `off`
🎙 خاموش و روشن کردن حالت درحال ضبط صدا
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
`TimeBiography`  `on` | `off`
⏰ خاموش و روشن کردن حالت تایم بیو
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆

🎈 دستورات فان ( سرگرمی )

`بدو`
`مرغ`
`ابر`
`love`
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆

📦 بخش کاربردی

 `/restart`
♻️ ری استارت کردن ربات
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
 `status`
♨️ مقدار رم درحال مصرف
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
 `block`
❌ بلاک کردن کاربر
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
 `unblock`
✅ آنبلاک کردن کاربر
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
**Memory Using** : $mem_using MB",
'parse_mode' => 'markdown']);
}
// Source_Home
// @Source_Home 
    if ($text == 'ping' or $text == '/ping' or $text == 'پینگ') {
        yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑩𝑶𝑻 𝑰𝑺 𝑶𝑵𝑳𝑰𝑵𝑬 :)"]);
          }
    if($text == 'ربات' or $text == '/ping'){
       yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑩𝑶𝑻 𝑰𝑺 𝑶𝑵𝑳𝑰𝑵𝑬 :)"]);
    }
       if($text == '/restart'){
           yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🗂 𝑻𝑯𝑬 𝑹𝑶𝑩𝑶𝑻 𝑾𝑨𝑺 𝑺𝑼𝑪𝑪𝑬𝑺𝑺𝑭𝑼𝑳𝑳𝒀 𝑹𝑬𝑺𝑻𝑨𝑹𝑻𝑬𝑫."]);
            $this->restart();
       }
    if ($text == 'مصرف' or $text == 'وضعیت' or $text == 'status'){
       $mem_using = round(memory_get_usage() / 1024 / 1024,1);
       yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑴𝑬𝑴𝑶𝑹𝒀 𝑼𝑺𝑰𝑵𝑮 : $mem_using"]);
    }
    if($text=='love'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '🧍‍♀________________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀_______________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀______________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀_____________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀____________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀___________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀__________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀_________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀________🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀_______🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀______🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀____🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀___🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀__🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♀_🧍‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '👫']);
}
if($text=='ابر'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '⚡️________________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️_______________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️______________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️_____________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️____________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️___________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️__________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️_________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️________☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️_______☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️______☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️____☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️___☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️__☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '⚡️_☁️']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🌩']);
}
if($text=='بدو'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '🏁________________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁_______________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁______________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁_____________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁____________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁___________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁__________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁_________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁________🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁_______🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁______🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁____🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁___🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁__🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🏁_🏃‍♂']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🧍‍♂🏁']);
}
if($text=='مرغ'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '🥚________________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚_______________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚______________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚_____________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚____________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚___________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚__________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚_________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚________🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚_______🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚______🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚____🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚___🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚__🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🥚_🐓']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => '🐣🐓']);
}
if($text == 'unblock' or $text == '/unblock' or $text == '!unblock'){
if($type3 == 'supergroup' or $type3 == 'chat'){
      $gmsg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
      $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
      $gms = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
      $messag = $gms['messages'][0]['from_id'];
      yield $this->contacts->unblock(['id' => $messag]);
      yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑼𝑵𝑩𝑳𝑶𝑪𝑲𝑬𝑫 !"]);
      } else {
        if($type3 == 'user'){
    yield $this->contacts->unblock(['id' => $peer]); yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "UnBlocked!"]);
    }
    }
    }
    // Source_Home
// @Source_Home 
    if($text == 'block' or $text == '/block' or $text == '!block'){
    if($type3 == 'supergroup' or $type3 == 'chat'){
      $gmsg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
      $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
      $gms = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
      $messag = $gms['messages'][0]['from_id'];
      yield $this->contacts->block(['id' => $messag]);
      yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑩𝑳𝑶𝑪𝑲𝑬𝑫 !"]);
      } else {
       if($type3 == 'user'){
    yield $this->contacts->block(['id' => $peer]); yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝑩𝑳𝑶𝑪𝑲𝑬𝑫 !"]);
    }
    }
    }
    // Source_Home
// @Source_Home 
}
}
}catch(Exception $e){
}
}
}
register_shutdown_function('shutdown_function', $lock);
closeConnection();
$MadelineProto->async(true);
$MadelineProto->loop(function () use ($MadelineProto) {
  yield $MadelineProto->setEventHandler('\EventHandler');
});
$MadelineProto->loop();
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/ 
?>
