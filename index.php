<?php

require_once "player.php"; //внутри реализовать class Player
require_once "tournament.php"; //внутри реализовать класс Tournament

$tournamentA = new Tournament("Tournament А", "2022.12.30");
$tournamentA
->addPlayer(new Player("Player 1","Minsk"))
->addPlayer(new Player("Player 2","Mogilev"))
->addPlayer(new Player("Player 3","Vitebsk"))
->addPlayer(new Player("Player 4","Gomel"));
$tournamentA->createPairs();

$tournamentB = new Tournament("Tournament B");
$tournamentB
->addPlayer( new Player("Player 1" ) )
->addPlayer( new Player("Player 2" ) )
->addPlayer( new Player("Player 3" ) )
->addPlayer( new Player("Player 4" ) )
->addPlayer( new Player("Player 5") )
->addPlayer( new Player("Player 6") )
->addPlayer( new Player("Player 7") );
$tournamentB->createPairs();
?>
