<?php

	class alphamon {

		public $ID;
		public $Name;
		public $Type;
		public $Description;
		public $Attack;
		public $Defense;
		public $Special_Attack;
		public $Special_Defense;
        public $Speed;
		public $HP;

		public static function Getall(){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT * FROM Alphamon ORDER BY Type");
				$req->execute();
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}
			return $res;
		}

		public static function Get($id){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT * FROM Alphamon WHERE ID = :where");
				$req->execute([':where' => $id]);
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return $res;
		}

		public static function weakness($type){

			$weakness = array();

			switch ($type) {
				case "Bug": array_push($weakness, "Fire", "Poison", "Flying", "Rock"); break;

				case "Dragon": array_push($weakness, "Ice", "Dragon"); break;

				case "Electric": array_push($weakness, "Ground"); break;

				case "Fighting": array_push($weakness, "Flying", "Psychic"); break;

				case "Fire": array_push($weakness, "Water", "Ground", "Rock"); break;
				
				case "Flying": array_push($weakness, "Ice", "Electric", "Rock"); break;

				case "Ghost": array_push($weakness, "Ghost"); break;

				case "Grass": array_push($weakness, "Fire", "Ice", "Poison", "Flying" ,"Bug"); break;

				case "Ground": array_push($weakness, "Water", "Grass", "Ice"); break;

				case "Ice": array_push($weakness, "Fire", "Fighting", "Rock" ); break;

				case "Normal": array_push($weakness, "Fighting"); break;

				case "Poison": array_push($weakness, "Ground", "Psychic", "Bug"); break;

				case "Psychic": array_push($weakness, "Bug", "Ghost"); break;

				case "Rock": array_push($weakness, "Water", "Grass", "Fighting", "Ground"); break;

				case "Water": array_push($weakness, "Electric", "Grass"); break;
			}
			return $weakness;
		}

		public static function resistance($type){

			$Resistance = array();

			switch ($type) {
				case "Bug": array_push($Resistance, "Grass", "Fighting", "Ground"); break;

				case "Dragon": array_push($Resistance, "Fire", "Water", "Electric", "Grass"); break;

				case "Electric": array_push($Resistance, "Electric", "Flying"); break;

				case "Fighting": array_push($Resistance, "Bug", "Rock"); break;

				case "Fire": array_push($Resistance, "Fire", "Grass", "Bug"); break;
				
				case "Flying": array_push($Resistance, "Grass", "Fighting", "Bug"); break;

				case "Ghost": array_push($Resistance, "Poison", "Bug"); break;

				case "Grass": array_push($Resistance, "Water", "Electric", "Grass", "Ground"); break;

				case "Ground": array_push($Resistance, "Poison", "Rock"); break;

				case "Ice": array_push($Resistance, "Ice"); break;

				case "Normal": array_push($Resistance, ""); break;

				case "Poison": array_push($Resistance, "Grass", "Fighting", "Poison"); break;

				case "Psychic": array_push($Resistance, "Fighting", "Psychic"); break;

				case "Rock": array_push($Resistance, "Normal", "Fire", "Poison", "Flying"); break;

				case "Water": array_push($Resistance, "Fire", "Water", "Ice"); break;
			}
			return $Resistance;
		}

		public static function immune($type){

			$Immune = array();

			switch ($type) {
				case "Flying": array_push($Immune, "Ground"); break;

				case "Ghost": array_push($Immune, "Normal", "Fighting"); break;

				case "Ground": array_push($Immune, "Electric"); break;

				case "Normal": array_push($Immune, "Ghost"); break;
			}
			return $Immune;
		}

		public static function convertType($number) {
			$type = "";

			switch ($number) {
				case "1":  $type = "Normal"; break;

				case "2":  $type = "Fire"; break;

				case "3":  $type = "Ice"; break;
				
				case "4":  $type = "Electric"; break;

				case "5":  $type = "Bug"; break;
				
				case "6":  $type = "Dragon"; break;

				case "7":  $type = "Fighting"; break;

				case "8":  $type = "Flying"; break;

				case "9":  $type = "Ghost"; break;

				case "10":  $type = "Grass"; break;

				case "11":  $type = "Ground"; break;

				case "12":  $type = "Poison"; break;

				case "13":  $type = "Psychic"; break;

				case "14":  $type = "Water"; break;

				case "15":  $type = "Rock"; break;
			}

			return $type;
		}

		public function save() {
			$db = db::getInstance();

			try {

				$req = $db->prepare("INSERT INTO Alphamon (ID, Name, Type, Description, Attack, Defense, Special_Attack, Special_Defense, Speed, HP) 
                                     VALUES (:ID, :Name, :Type, :Description, :Attack, :Defense, :Special_Attack, :Special_Defense, :Speed, :HP)");
				$req->execute([
					':ID' => $this->ID,
					':Name' => $this->Name,
					':Type' => $this->Type, 
					':Description' => $this->Description, 
					':Attack' => $this->Attack, 
					':Defense' => $this->Defense,
					':Special_Attack' => $this->Special_Attack,
					':Special_Defense' => $this->Special_Defense,
					':Speed' => $this->Speed,
					':HP' => $this->HP
				]);
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return true;
		}

		public static function Delete($id){
			$db = db::getInstance();

			try {
				$req = $db->prepare("DELETE FROM Alphamon WHERE ID = :where1 DELETE FROM AlphamonMoves WHERE MonsterID = :where2");
				$req->execute([
					':where1' => $id,
					':where2' => $id,
				]);
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return true;
		}
	}

?>