<?php
	$ch = curl_init() ;  
	curl_setopt ($ch, CURLOPT_URL, 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=218.4.255.255');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
	echo $output = curl_exec($ch) ; 
	$data = json_decode($output, true);
	echo $data->{'city'};
?>