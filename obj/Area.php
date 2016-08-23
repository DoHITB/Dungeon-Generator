<?php
class Area{
	private $Rarity = "Common";
	private $Discovery = "None";
	private $Danger = "None";
	private $Themed = "No";
	private $Type = array();

	public function __construct(){
		$this->AreaTypeContents();
		$this->MainGenerator();
	}
	public function Print_Area(){
		echo "<h2>AREA:</h2>";
		echo "Themed: " . $this->Themed . "<br>";
		echo "Rarity: " . $this->Rarity . "<br>";
		echo "Discovery: <br>&emsp;" . $this->Discovery . "<br>";
		echo "Danger: <br>&emsp;" . $this->Danger . "<br>";
	}

	private function AreaTypeContents(){
		$Table = array(
			array("Unthemed", "Common", "", ""), 
			array("Unthemed", "Common", "", "Danger"), 
			array("Unthemed", "Common", "Discovery", "Danger"), 
			array("Unthemed", "Common", "Discovery", "Danger"), 
			array("Unthemed", "Common", "Discovery", ""), 
			array("Unthemed", "Common", "Discovery", ""), 
			array("Themed", "Common", "", "Danger"), 
			array("Themed", "Common", "Discovery", "Danger"), 
			array("Themed", "Common", "Discovery", ""), 
			array("Themed", "Unique", "", "Danger"), 
			array("Themed", "Unique", "Discovery", "Danger"), 
			array("Themed", "Unique", "Discovery", ""));

		$this->Type = CheckTable($Table);
	}

	private function MainGenerator(){
		$this->Themed = $this->Type[0];
		$this->Rarity = $this->Type[1];

		if ($this->Type[2] == "Discovery"){
			$this->GenerateDiscovery();
		}

		if ($this->Type[3] == "Danger"){
			$this->GenerateDanger();
		}
	}

	private function GenerateDiscovery(){
		$Table_Discovery_Type = [
			"Dressing", 
			"Dressing", 
			"Dressing", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Find",
			"Find",
			"Find"];

		$Table_Dressing = [
			"Dressing: Junk/debris", 
			"Dressing: Tracks/marks", 
			"Dressing: Signs of battle", 
			"Dressing: Writing/carving", 
			"Dressing: Warning", 
			"Dressing: Dead Creature (p49)", 
			"Dressing: Bones/remains", 
			"Dressing: Book/scroll/map", 
			"Dressing: Broken door/wall", 
			"Dressing: Breeze/wind/smell", 
			"Dressing: Lichen/moss/fungus", 
			"Dressing: Oddity (p50)"];

		$Table_Feature = [
			"Feature: Cave-in/collapse", 
			"Feature: Pit/shaft/chasm", 
			"Feature: Pillars/columns", 
			"Feature: Locked door/gate", 
			"Feature: Alcoves/niches", 
			"Feature: Bridge/stairs/ramp", 
			"Feature: Fountain/well/pool", 
			"Feature: Puzzle", 
			"Feature: Altar/dais/platform", 
			"Feature: Statue/idol", 
			"Feature: Magic pool/statue/idol", 
			"Feature: Connection to another dungeon"];

		$Table_Find = [
			"Find: Trinkets", 
			"Find: Tools", 
			"Find: Weapons/armor", 
			"Find: Supplies/trade goods", 
			"Find: Coins/gems/jewelry", 
			"Find: Poisons/potions", 
			"Find: Adventurer/captive", 
			"Find: Magic item", 
			"Find: Scroll/book", 
			"Find: Magic weapon/armor", 
			"Find: Artifact", 
			"Find: Roll twice"];

		$Discovery = CheckTable($Table_Discovery_Type);

		if ($Discovery == "Dressing"){
			$this->Discovery = CheckTable($Table_Dressing);
		}
		elseif ($Discovery == "Feature"){
			$this->Discovery = CheckTable($Table_Feature);
		}
		elseif ($Discovery  == "Find"){
			$this->Discovery = CheckTable($Table_Find);
		}
		else{
			$this->Discovery = "None";
		}
	}

	private function GenerateDanger(){
		$Table_Danger_Type = array(
			"Trap", 
			"Trap", 
			"Trap", 
			"Trap", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Entity");

		$Table_Traps = array(
			"Trap: Alarm", 
			"Trap: Ensnaring/paralyzing", 
			"Trap: Pit", 
			"Trap: Crushing", 
			"Trap: Piercing/puncturing", 
			"Trap: Chopping/slashing", 
			"Trap: Confusing (maze, etc.)", 
			"Trap: Gas (poison, etc.)", 
			"Trap: element (p50)", 
			"Trap: Ambush", 
			"Trap: Magical", 
			"Trap: Roll twice");

		$Table_Creatures = array(
			"Creature: Waiting in ambush", 
			"Creature: Fighting/squabbling", 
			"Creature: Prowling/on patrol", 
			"Creature: Looking for food", 
			"Creature: Eating/resting", 
			"Creature: Guarding", 
			"Creature: On the move", 
			"Creature: Searching/scavenging", 
			"Creature: Returning to den", 
			"Creature: Making plans", 
			"Creature: Sleeping", 
			"Creature: Dying");

		$Table_Entity = array(
			"Entity: Alien interloper", 
			"Entity: Vermin lord", 
			"Entity: Criminal mastermind", 
			"Entity: Warlord", 
			"Entity: High priest", 
			"Entity: Oracle", 
			"Entity: Wizard/witch/alchemist", 
			"Entity: Monster lord (p49)", 
			"Entity: Evil spirit/ghost", 
			"Entity: Undead lord (lich, etc.)", 
			"Entity: Demon", 
			"Entity: Dark god");

		$Danger = CheckTable($Table_Danger_Type);

		if ($Danger == "Trap"){
			$this->Danger = CheckTable($Table_Traps);
		}
		elseif ($Danger == "Creature (pag 49)"){
			$this->Danger = CheckTable($Table_Creatures);
		}
		elseif ($Danger  == "Entity"){
			$this->Danger = CheckTable($Table_Entity);
		}
		else{
			$this->Danger = "None";
		}
	}
}
?>
