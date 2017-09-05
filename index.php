<?php

/******************************************************************************
* ENOM SETTINGS
******************************************************************************/
$settings[api] = "http://dynamic.name-services.com/interface.asp";

/******************************************************************************
* START
******************************************************************************/
$host = $_GET['host'];
$domain = $_GET['domain'];
$key = $_GET['key'];
$ip = $_GET['ip'];

//Optional - Strip trailing domain from $host value
$host = str_replace("." . $domain, "", $host);

/******************************************************************************
* PARAMATERS
******************************************************************************/
$params['command'] = "SetDNSHost";
$params['HostName'] = $host;
$params['Zone'] = $domain;
$params['DomainPassword'] = $key;
$params['Address'] = $ip;

/******************************************************************************
* UPDATE ENOM
******************************************************************************/
$url =  $settings[api] . "?" . http_build_query($params);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HEADER, 0);
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
