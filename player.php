<?php

class Player
{
  private $name;
  private $city;

  public function __construct($name,$city=null)
  {
    $this->name = $name;
    $this->city = $city;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getCity()
  {
    return $this->city;
  }
}
?>
