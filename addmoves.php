<?php
	include('header.php');

	if (user::levelCheck(2)) {

		if(
			isset($_POST["move"]) &&
			isset($_POST["move"]["Name"]) && !empty($_POST["move"]["Name"]) &&
			isset($_POST["move"]["Power"]) && 
			isset($_POST["move"]["Type"]) && !empty($_POST["move"]["Type"]) &&
			isset($_POST["move"]["Description"]) && !empty($_POST["move"]["Description"]) &&
			isset($_POST["move"]["Status"]) &&
			isset($_POST["move"]["StatusChance"]) &&
			isset($_POST["move"]["Category"]) && !empty($_POST["move"]["Category"])
		) {

			$move = new move();
			$move->Name = $_POST["move"]["Name"];
			$move->Power = $_POST["move"]["Power"];
			$move->Type = $_POST["move"]["Type"];
			$move->Description = $_POST["move"]["Description"];
			$move->StatusChance = $_POST["move"]["StatusChance"];
			$move->Status = $_POST["move"]["Status"];
			$move->Category = $_POST["move"]["Category"];

			if ($move->save()){
				header('Location: ' . $GLOBALS["URl"] . "moves.php");
				exit;
			} else {
				header('Location: ' . $GLOBALS["URl"] . "error.php");
				exit;
			}
		}
	?>

	<form action="" method="post">
		<input type="text" id="Name" name="move[Name]" placeholder="Name"/>
		<br />
		<input type="text" id="Power" name="move[Power]" placeholder="Power"/>
		<br />
		<input type="text" id="Type" name="move[Type]" placeholder="Type" />
		<br />
		<input type="text" id="Description" name="move[Description]" placeholder="Description" />
		<br />
		<input type="text" id="Status" name="move[Status]" placeholder="Status" />
		<br />
		<input type="text" id="StatusChance" name="move[StatusChance]" placeholder="Chance" />
		<br />
		<select name="move[Category]" >
			<option value="1">Physical</option>
			<option value="2">Special</option>
		</select>
		<br />
		<input type="submit" name="Register" value="Register" />
	</form>

<?php

	} else {
		header('Location: ' . $GLOBALS["URl"] . "error.php");
	}
	
?>  
