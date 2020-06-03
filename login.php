<?php
	include('header.php');

	if(
		isset($_POST["login"]) &&
		isset($_POST["login"]["Username"]) &&
		isset($_POST["login"]["Password"])
	)
	{
		$db = db::getInstance();

		$req = $db->prepare('SELECT * FROM Account WHERE Username = :Username');

		$req->execute([
			':Username' => $_POST["login"]["Username"]
		]);

		$result = $req->fetch();

		if($_POST["login"]["Password"] == $result["Password"]){
			$_SESSION["account"] = $result;

			header('Location: '.$GLOBALS["URl"]. "index.php");exit;
		}else{
			header('Location: '.$GLOBALS["URl"]. "error.php");exit;
		}
	}
	?>

	<form action="" method="post">
		<input type="text" id="Username" name="login[Username]" placeholder="Username" autofocus/>
		<br />
		<input type="Password" id="Password" name="login[Password]" placeholder="Password"/>
		<br />
		<input type="submit" name="Login" value="Login" />
	</form>
   </body>
</html>

