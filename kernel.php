<?php
include_once './obj/Area.php';
include_once './obj/Dungeon.php;

function CheckTable($table){
	return $table[rand(0, count($table) - 1)];
}

$myDungeon = new Dungeon();
$myDungeon->printDungeon();

//$MyArea = new Area();
//$MyArea->Print_Area();
?>
