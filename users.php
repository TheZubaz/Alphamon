<?php
	include('header.php');

    if (user::levelCheck(2)) {

        foreach (user::Getall() as $user) {
            ?><a href="<?= $GLOBALS["URl"] . "userview.php?id=" . $user['ID']?>" ><?= $user['Username']?></a><br><?php
        }

    } else {
        header('Location: ' . $GLOBALS["URl"] . "error.php");
    }
    
?>  
