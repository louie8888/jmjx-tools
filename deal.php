



<?php

$ipAndDomainsStr = $_REQUEST["ipAndDomains"];


$record_arr = $_POST['record'];
$ipDomain_arr = explode("\r\n", $ipAndDomainsStr);
$ipDomain_arr = array_filter($ipDomain_arr);

#echo $ipDomain_arr;

$domainFileName = "domain.txt";


foreach($ipDomain_arr as $ipDomain)
{

	//echo '----' . $ipDomain . '+++';
	//如果有多个空格，删除剩一个空格
	$ipDomain=preg_replace ( "/\s(?=\s)/","\\1", $ipDomain);
	//去除字符串左右两边的空格
	$ipDomain=trim($ipDomain);
	//将字符串以空格为界分隔
	$ip_domain_arr=preg_split("/\s+/", $ipDomain);
	//var_dump($ip_domain_arr);
	$ip = $ip_domain_arr[0];
	$domain = $ip_domain_arr[1];
	//baidu.com|@|A|123.123.123.123|默认
	foreach($record_arr as $record)
	{
		echo $domain . '|' . $record . '|A|' . $ip . '|' . '默认';
		echo '<br>';
		//域名不存在才去写入文档，防止重复多个保存
		//fwrite('./ipdomain.txt', "$domain|$record|$ip|默认\n");//\r\n也可以，好像还更好，不会错乱？
	}




}


?>


