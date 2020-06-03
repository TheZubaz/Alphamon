<?php
	include('header.php');

	if (user::levelCheck(2)) {

		if(
			isset($_POST["mon"]) &&
			isset($_POST["mon"]["ID"]) && !empty($_POST["mon"]["ID"]) &&
			isset($_POST["mon"]["Name"]) && !empty($_POST["mon"]["Name"]) &&
			isset($_POST["mon"]["Type"]) && !empty($_POST["mon"]["Type"]) &&
			isset($_POST["mon"]["Description"]) && !empty($_POST["mon"]["Description"]) &&
			isset($_POST["mon"]["Attack"]) && !empty($_POST["mon"]["Attack"]) &&
			isset($_POST["mon"]["Defense"]) && !empty($_POST["mon"]["Defense"]) &&
			isset($_POST["mon"]["Special_Attack"]) && !empty($_POST["mon"]["Special_Attack"]) &&
			isset($_POST["mon"]["Special_Defense"]) && !empty($_POST["mon"]["Special_Defense"]) &&
			isset($_POST["mon"]["Speed"]) && !empty($_POST["mon"]["Speed"]) &&
			isset($_POST["mon"]["HP"]) && !empty($_POST["mon"]["HP"]) &&
			isset($_POST["mon"]["Move1"]) && !empty($_POST["mon"]["Move1"]) &&
			isset($_POST["mon"]["Move2"]) && !empty($_POST["mon"]["Move2"]) &&
			isset($_POST["mon"]["Move3"]) && !empty($_POST["mon"]["Move3"]) &&
			isset($_POST["mon"]["Move4"]) && !empty($_POST["mon"]["Move4"])
		) {

			$move = new koppel();
			$move->MonID = $_POST["mon"]["ID"];
			$move->MoveID1 = $_POST["mon"]["Move1"];
			$move->MoveID2 = $_POST["mon"]["Move2"];
			$move->MoveID3 = $_POST["mon"]["Move3"];
			$move->MoveID4 = $_POST["mon"]["Move4"];

			$mon = new alphamon();
			$mon->ID = $_POST["mon"]["ID"];
			$mon->Name = $_POST["mon"]["Name"];
			$mon->Type = $_POST["mon"]["Type"];
			$mon->Description = $_POST["mon"]["Description"];
			$mon->Attack = $_POST["mon"]["Attack"];
			$mon->Defense = $_POST["mon"]["Defense"];
			$mon->Special_Attack = $_POST["mon"]["Special_Attack"];
			$mon->Special_Defense = $_POST["mon"]["Special_Defense"];
			$mon->Speed = $_POST["mon"]["Speed"];
			$mon->HP = $_POST["mon"]["HP"];

			if ($move->saveKoppel() && $mon->save()){
				header('Location: ' . $GLOBALS["URl"] . "alphamons.php");
			} else {
				header('Location: ' . $GLOBALS["URl"] . "error.php");
				exit;
			}
		}
	?>

	<form action="" method="post">
		<input type="text" id="ID" name="mon[ID]" placeholder="ID"/>
		<br />
		<input type="text" id="Name" name="mon[Name]" placeholder="Name"/>
		<br />
		<input type="text" id="Type" name="mon[Type]" placeholder="Type"/>
		<br />
		<input type="text" id="Description" name="mon[Description]" placeholder="Description" />
		<br />
		<input type="text" id="Attack" name="mon[Attack]" placeholder="Attack" />
		<br />
		<input type="text" id="Defense" name="mon[Defense]" placeholder="Defense" />
		<br />
		<input type="text" id="Special_Attack" name="mon[Special_Attack]" placeholder="Special attack" />
		<br />
		<input type="text" id="Special_Defense" name="mon[Special_Defense]" placeholder="Special defense" />
		<br />
		<input type="text" id="Speed" name="mon[Speed]" placeholder="Speed" />
		<br />
		<input type="text" id="HP" name="mon[HP]" placeholder="HP" />
		<br />
		<select name="mon[Move1]">
			<?php
			foreach (move::Getall() as $move1) {
				?><option value="<?= $move1['ID']?>"><?= $move1['Name']?></option><?php
			}
			?>
		</select>
		<br />
		<select name="mon[Move2]">
			<?php
			foreach (move::Getall() as $move2) {
				?><option value="<?= $move2['ID']?>"><?= $move2['Name']?></option><?php
			}
			?>
		</select>
		<br />
		<select name="mon[Move3]">
			<?php
			foreach (move::Getall() as $move3) {
				?><option value="<?= $move3['ID']?>"><?= $move3['Name']?></option><?php
			}
			?>
		</select>
		<br />
		<select name="mon[Move4]">
			<?php
			foreach (move::Getall() as $move4) {
				?><option value="<?= $move4['ID']?>"><?= $move4['Name']?></option><?php
			}
			?>
		</select>
		<br />
		<input type="submit" name="Register" value="Register" />
	</form>

<?php

	} else {
		header('Location: ' . $GLOBALS["URl"] . "error.php");
	}
	
?>  
