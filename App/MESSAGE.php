<?php
namespace App;
class Message{
const LIMIT_USENAME = 3;
const LIMIT_SMS = 10;
private $useranme;
private $sms;
private $date;


public function __construct(string $useranme,string $sms)
{
  $this->useranme = $useranme;
  $this->sms = $sms;
}

public function isValid():bool{
    return empty($this->getEroors());
}

public function getEroors():array
{
    $erroors = [];
    if(strlen($this->useranme) < self::LIMIT_USENAME){
        $erroors["username"] = "Le prénom doit avoir au moins trois caractères";
    }
    if(strlen($this->sms) < self::LIMIT_SMS){ 
    $erroors["message"] = "Le message doit avoir au moins dix caractères";
  }
  return $erroors;
 
}

}