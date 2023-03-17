<?php
namespace App\CustomClass;

class Hashed
{

    private $pass;
    private $hash;

    function set_pass($pass,$userEm) {
      $this->pass = $pass.$userEm;
    }
  
    function get_hash() {
        $this->hash = hash('sha256',$this->pass);
      return $this->hash;
    }
  
}