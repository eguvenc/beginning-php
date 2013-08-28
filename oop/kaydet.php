<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kaydet
 *
 * @author fatih
 */
class kaydet {
    public $ad;
    
    function kayit() {
       $ad=$_POST['ad'];
       return $this->ad;
    }
}

?>
