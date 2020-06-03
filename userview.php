<?php
include('header.php');

if (user::levelCheck(2)) {

    $user = user::Get($_GET['id'])[0]; ?>

    Username: <?=$user['Username']?><br>
    ELO: <?=$user['ELO']?><br>
    Wins: <?=$user['Wins']?><br>
    Losses: <?=$user['Losses']?><br>
    Role: <?=$user['Role']?><br>

    <form action="" method="post">
    <?php
        if (isset($_POST["Delete"])){
            ?>Are you sure you want to delete this user?<input class="btn btn-danger" type="submit" name="Del" value="Yes" /><?php 
        }else{
            ?> <input type="submit" name="Delete" value="Delete" /><?php
        }
    ?>
    </form>
    <?php

    if (isset($_POST["Del"])){

        if(user::Delete($_GET['id'])) {
            header('Location: ' . $GLOBALS["URl"] . "users.php");
        } else {
            header('Location: ' . $GLOBALS["URl"] . "error.php");
        }
    }

} else {
    header('Location: ' . $GLOBALS["URl"] . "error.php");
}

?>  