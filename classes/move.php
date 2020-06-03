<?php

	class move {

		public $Name;
		public $Power;
		public $Type;
		public $Description;
		public $StatusChance;
		public $Status;
		public $Category;

		public static function Getall(){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT * FROM Moves ORDER BY Type");
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
				$req = $db->prepare("SELECT * FROM Moves WHERE ID = :where");
				$req->execute([':where' => $id]);
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return $res;
		}

		public function save() {
			$db = db::getInstance();

			try {

				$req = $db->prepare("INSERT INTO Moves (Name, Power, Type, Description, StatusChance, Status, Category) 
                                     VALUES (:Name, :Power, :Type, :Description, :StatusChance, :Status, :Category)");
				$req->execute([
					':Name' => $this->Name,
					':Power' => $this->Power, 
					':Type' => $this->Type, 
					':Description' => $this->Description, 
					':StatusChance' => $this->StatusChance,
					':Status' => $this->Status,
					':Category' => $this->Category
				]);
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return true;
		}

		public static function Delete($id){
			$db = db::getInstance();

			try {
				$req = $db->prepare("DELETE FROM Moves WHERE ID = :where1 DELETE FROM AlphamonMoves WHERE MovesID = :where2");
				$req->execute([
					':where1' => $id,
					':where2' => $id,
				]);
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return true;
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

		public static function convertStatus($number) {
			$status = "";

			switch ($number) {
				case "0":  $status = "None"; break;

				case "1":  $status = "Burn"; break;

				case "2":  $status = "Freeze"; break;

				case "3":  $status = "Paralyze"; break;

				case "4":  $status = "Poison"; break;

				case "5":  $status = "Sleep"; break;
			}

			return $status;
		}

		public static function convertCategory($number) {
			$category = "";

			switch ($number) {
				case "1":  $category = "Physical"; break;

				case "2":  $category = "Special"; break;
			}

			return $category;
		}

	}

?>