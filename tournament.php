<?php

class Tournament {
  private $players=array();
  private $name;
  private $start_date;

  public function __construct($name, $start_date=null)
  {
    $this->name = $name;
    $this->start_date = $start_date;
  }

  public function addPlayer(Player $player)
  {
    $this->players[]=$player;
    return $this;
  }

  public function createPairs()
  {
    $teams=$this->players;
    $count = count($teams);
    $half = $count/2;
    $team1 = array_slice($teams, 0, $half);
    $team2 = array_slice($teams, $half);
    $day = 0;
    if($dateFormat=$this->start_date){
      $date = DateTime::createFromFormat('Y.m.d', $dateFormat);
      $date->modify("+1 day");
      $nextDate= $date->format('d.m.Y');
    }else{
      $date=strtotime("+1 day");
      $nextDate=date(" d.m.Y", $date);
      $dateFormat = new DateTime($nextDate);
      $nextDate = $dateFormat->format('d.m.Y');
    }
    if($count%2==0){
      $schedule=$count - 1;
    }else{
      $schedule=$count;
    }
    while ($day < $schedule) {
      echo $this->name.", ".$nextDate. "<br>\n";
      $day++;
      if($dateFormat=$this->start_date){
        $date->modify("+1 day");
        $nextDate= $date->format('d.m.Y');
      }else{
        $dateFormat = new DateTime($nextDate);
        $dateFormat->modify('+1 day');
        $nextDate = $dateFormat->format('d.m.Y');
      }
      $temp = 1;
      for ($i = 0; $i < $temp; $i++) {
        if($count%2==0){
          $tmp = $teams[1];
        }else{
          $tmp = $teams[0];
        }
        if($count%2==0){
          for ($j = 1; $j < $count - 1; $j++)
          $teams[$j] = $teams[$j + 1];
          $teams[$count - 1] = $tmp;
        }else{
          for ($j = 0; $j < $count - 1; $j++)
          $teams[$j] = $teams[$j + 1];
          $teams[$count - 1] = $tmp;
        }
        if($count%2==0){
          for ($i = 0; $i < $half; $i++) {
            $team1[$i] = $teams[$i];
            $team2[$i] = $teams[$count - $i - 1];
            echo ($team1[$i]->getName()." (".$team1[$i]->getCity().") ". "- " . $team2[$i]->getName()." (".$team2[$i]->getCity().") ". "<br>\n");
          }
        }else{
          for ($i = 0; $i < $half-1; $i++) {
            $team1[$i] = $teams[$i];
            $team2[$i] = $teams[$count - $i - 1];
            echo ($team1[$i]->getName(). "-" . $team2[$i]->getName(). "<br>\n");
          }
        }
      }
    }
  }
}
?>
