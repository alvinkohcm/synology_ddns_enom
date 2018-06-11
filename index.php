<?php

/******************************************************************************
* ENOM SETTINGS
******************************************************************************/
$settings[api] = "https://reseller.enom.com/interface.asp";

/******************************************************************************
* START
******************************************************************************/
$token = $_GET['token'];
$host = $_GET['host'];
$username = $_GET['username'];
$key = $_GET['key'];
$ip = $_GET['ip'];

/******************************************************************************
* PARAMATERS
******************************************************************************/
$params['command'] = "SetDNSHost";
$params['uid'] = $username;
$params['zone'] = $host;
$params['domainpassword'] = $key;
$params['address'] = $ip;
$params['pw'] = $token;

/******************************************************************************
* UPDATE ENOM
******************************************************************************/
$url =  $settings[api] . "?" . http_build_query($params);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$data = curl_exec($ch);
curl_close($ch);

if ($data)
{
 $log = explode("\r\n",$data);
 
 foreach ($log AS $row)
 {
  if (preg_match("/^([^=]+)=(.*)$/i",$row,$matches))
  {
   $result[$matches[1]] = $matches[2];
  }
 }
 
 if ($result['ErrCount']==0)
 {
  echo "Success: good (IP: {$result[IP]})";
 }
 else
 {
  echo "Error: badauth - {$result[Err1]}";
 }
}
else
{
 echo "Error: badconn";
}

?>
