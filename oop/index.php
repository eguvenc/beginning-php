<?php
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    
    require_once 'mysql.php';
    $db = new mySQL();
    
   
    echo '<h1>kayitlar</h1>';
    
    $db->sorgu("SELECT * FROM okul2");
    $sonuc = $db->listele();
    echo '<div style="width:450px">';
    
    foreach ($sonuc as $liste=> $okul){
        
        echo "<div>{$okul['adsoyad']} <b>{$okul['sira']}</b>";
        
    }
    
    echo '</div>';
    
?>
