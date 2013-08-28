<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mysql
 *
 * @author fatih
 */
class mySQL {
    public $db , $sql, $sorgu;
        
    function __construct() {
         $this->db=  mysql_connect('localhost','root','12345') or die(mysql_error()) ;
         mysql_select_db("abc", $this->db);
        }

        function sorgu($sorgu){
            $this->sql = mysql_query($sorgu, $this->db);
            
            if( ! $this->sql)
            {
                 die(mysql_error());
                 
            }
        }
        
        function listele(){
            if ($this->sql){
                $kayit=array();
                while ($row=  mysql_fetch_assoc($this->sql)){
                    $kayit[]=$row;
                }
                return $kayit;
            }
        }
    function __destruct() {
        mysql_close($this->db);
    }
        
  }
    


?>
