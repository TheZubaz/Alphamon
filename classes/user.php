<?php

	class user {

		public static function levelCheck($Getal) {

			if(isset($_SESSION['account'])){
				$level = $_SESSION['account']['Role'];

				if($level >= $Getal) {
					return true;
				} else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	
		public static function Getall(){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT * FROM Account");
				$req->execute();
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}
			return $res;
		}

		public static function Delete($id){
			$db = db::getInstance();

			try {
				$req = $db->prepare("DELETE FROM Account WHERE ID = :where");
				$req->execute([':where' => $id]);
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return true;
		}

		public static function Get($id){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT * FROM Account WHERE ID = :where");
				$req->execute([':where' => $id]);
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return $res;
		}
	
		public static function Ranking(){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT * FROM Account ORDER BY ELO DESC");
				$req->execute();
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}
			return $res;
		}

		public static function Winrate($win, $loss){
			if ($win != 0){
				$comb = $win / ($win + $loss) * 100;
			} else {
				$comb = 0;
			}
			return $comb;
		}
	}

?>