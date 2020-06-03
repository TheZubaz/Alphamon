<?php

	class koppel {

		public $MonID;
		public $MoveID1;
		public $MoveID2;
		public $MoveID3;
		public $MoveID4;

		public function saveKoppel() {
			$db = db::getInstance();

			try {

				$req = $db->prepare("INSERT INTO AlphamonMoves (MonsterID, MovesID) VALUES (:MonID1, :MoveID1), (:MonID2, :MoveID2), (:MonID3, :MoveID3), (:MonID4, :MoveID4)");
				$req->execute([
					':MonID1' => $this->MonID,
					':MonID2' => $this->MonID,
					':MonID3' => $this->MonID,
					':MonID4' => $this->MonID,
					':MoveID1' => $this->MoveID1,
					':MoveID2' => $this->MoveID2,
					':MoveID3' => $this->MoveID3,
					':MoveID4' => $this->MoveID4
				]);
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return true;
		}

		public static function getMoves($id){
			$db = db::getInstance();

			try {
				$req = $db->prepare("SELECT Moves.Name, AlphamonMoves.MonsterID, AlphamonMoves.MovesID FROM Moves, AlphamonMoves WHERE AlphamonMoves.MonsterID = :where AND Moves.ID = AlphamonMoves.MovesID");
				$req->execute([':where' => $id]);
				$res = $req->fetchall();
			} catch(PDOException $Exception) {
				return $Exception->getMessage();
			}	
			return $res;
		}
	}

?>