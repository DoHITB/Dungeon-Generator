<?php
include_once './obj/Area.php';
include_once './obj/Dungeon.php;

function CheckTable($Table){
	return $Table[rand(0, count($Table) - 1)];
}

$MyDungeon = new Dungeon();
$MyDungeon->printDungeon();

//$MyArea = new Area();
//$MyArea->Print_Area();
?>
