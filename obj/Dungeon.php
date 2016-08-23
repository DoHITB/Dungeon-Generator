<?php
class Dungeon{
	private $Size = "";
	private $Number_of_Themes = 0;
	private $Number_of_Areas = 0;
	private $Builder = "";
	private $Ruination = "";
	private $Themes = array(); 
	private $Areas = array(); 


	public function __construct(){
		$this->GenerateSize();
		$this->GenerateNumberOfThemesAndAreas();
		$this->GenerateBuilder();
		$this->GenerateThemes();
		$this->GenerateAreas();
		$this->GenerateRuination();
	}

	private function GenerateSize(){
		$Table = array("Small", "Medium", "Large", "Huge");
		$this->Size = CheckTable($Table) ;
	}

	private function GenerateNumberOfThemesAndAreas(){
		$DungeonSize = $this->Size;

		if ($DungeonSize == "Small"){
			$this->Number_of_Themes = rand(1, 4);
			$this->Number_of_Areas = rand(1, 6) + 2;
		}
		elseif ($DungeonSize == "Medium"){
			$this->Number_of_Themes = rand(1, 6);
			$this->Number_of_Areas = 2 * rand(1, 6) + 2;
		}
		elseif ($DungeonSize == "Large"){
			$this->Number_of_Themes = rand(1, 6) + 1;
			$this->Number_of_Areas = 3 * rand(1, 6) + 6;
		}
		elseif ($DungeonSize == "Huge"){
			$this->Number_of_Themes = rand(1, 6) + 2;
			$this->Number_of_Areas = 4 * rand(1, 6) + 10;
		}
		else
			$this->Number_of_Themes = 0;
	}

	private function GenerateAreas(){
		foreach (range(0, $this->Number_of_Areas) as $i){
			$New_Area = new Area();
			$this->Areas[] = $New_Area;
		}
	}

	private function GenerateThemes(){	
		$Table_Rarity = array("Mundane", "Unusual", "Extraordinary");

		$Table_Mundane = array(
			"Mundane:\t Rot/decay", 
			"Mundane:\t Torture/agony", 
			"Mundane:\t Madness", 
			"Mundane:\t All is lost", 
			"Mundane:\t Noble sacrifice", 
			"Mundane:\t Savage fury", 
			"Mundane:\t Survival", 
			"Mundane:\t Criminal activity", 
			"Mundane:\t Secrets/treachery", 
			"Mundane:\t Tricks and traps", 
			"Mundane:\t Invasion/infestation", 
			"Mundane:\t Factions at war" );

		$Table_Unusual = array(
			"Unusual:\t Creation/invention", 
			"Unusual:\t Element (p50)", 
			"Unusual:\t Knowledge/learning", 
			"Unusual:\t Growth/expansion", 
			"Unusual:\t Deepening mystery", 
			"Unusual:\t Transformation/change", 
			"Unusual:\t Chaos and destruction", 
			"Unusual:\t Shadowy forces", 
			"Unusual:\t Forbidden knowledge", 
			"Unusual:\t Poison/disease", 
			"Unusual:\t Corruption/blight", 
			"Unusual:\t Impending disaster" );

		$Table_Extraotrinary = array(
			"Extraordinary:\t Scheming evil", 
			"Extraordinary:\t Divination/scrying", 
			"Extraordinary:\t Blasphemy", 
			"Extraordinary:\t Arcane research", 
			"Extraordinary:\t Occult forces", 
			"Extraordinary:\t An ancient curse", 
			"Extraordinary:\t Mutation", 
			"Extraordinary:\t The unquiet dead", 
			"Extraordinary:\t Bottomless hunger", 
			"Extraordinary:\t Incredible power", 
			"Extraordinary:\t Unspeakable horrors", 
			"Extraordinary:\t Holy war" );

		foreach(range(1, $this->Number_of_Themes) as $themes){
			$Rarity = CheckTable($Table_Rarity);

			if ($Rarity == "Mundane")
				$this->Themes[] = (CheckTable($Table_Mundane));
			elseif ($Rarity == "Unusual")
				$this->Themes[] = (CheckTable($Table_Unusual));
			elseif ($Rarity == "Extraordinary")
				$this->Themes[] = (CheckTable($Table_Extraotrinary));
			else
				$this->Themes[] = "Error";
		}
	}

	private function GenerateBuilder(){
		$Table = array("aliens/precursors", 
			"demigod/demon",
			"natural (caves, etc.)", 
			"natural (caves, etc.)", 
			"religious order/cult", 
			"Humanoid (p49)", 
			"Humanoid (p49)", 
			"dwarves/gnomes", 
			"dwarves/gnomes", 
			"elves", 
			"wizard/madman", 
			"monarch/warlord");

		$this->Builder= CheckTable($Table);
	}

	private function GenerateRuination(){
		$Table = array("Arcane disaster", 
			"Damnation/curse", 
			"Earthquake/fire/flood", 
			"Plague/famine/drought", 
			"Overrun by monsters", 
			"War/invasion", 
			"Depleted resources", 
			"Better prospects elsewhere");

		$this->Ruination = CheckTable($Table);
	}

	public function printDungeon(){
		print "<h1>Dungeon Generator</h1>" . "\n";
		print "Size: " . $this->Size . "<br>";
		print "Number of themes: " . $this->Number_of_Themes . "<br>";
		print "Number of areas: " . $this->Number_of_Areas . "<br>";
		print "Builder: " . $this->Builder . "<br>";
		print "Ruination: " . $this->Ruination . "<br>";
		print "Themes: " . "<br>";
		
		foreach($this->Themes as $Theme){
			print "&emsp;" . $Theme . "<br>";
		}

		foreach($this->Areas as $Area){
			$Area->Print_Area();
		}
	}
}
?>
