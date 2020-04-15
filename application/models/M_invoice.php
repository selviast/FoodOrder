<?php
class M_invoice extends CI_Model{
 
    function get_no_invoice(){
       // Generating a random number 
        $randomNumber = rand();         
        $randomNumber = 'Rm'.rand(100,9999);         
        return $randomNumber; 
    
    }
 
}