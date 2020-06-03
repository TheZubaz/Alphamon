<?php
    session_start();
    include('./classes/classes.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alphamon</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <img src="./images/banner.png" alt="Alpamon banner">
    </header>
    <nav>
        <ul class="navigation">
            <li><a href="<?= $GLOBALS["URl"]?>index.php">Home</a></li>
            <li><a href="<?= $GLOBALS["URl"]?>alphamons.php">Alphamons</a></li>
            <li><a href="<?= $GLOBALS["URl"]?>moves.php">Moves</a></li>
            <li><a href="<?= $GLOBALS["URl"]?>rankings.php">Rankings</a></li>
            <?php
            if (!isset($_SESSION["account"])) {
            } else {
                if (user::levelCheck(2)) {
                ?>
                    <li><a href="<?= $GLOBALS["URl"]?>users.php">Users</a></li>
                    <li><a href="<?= $GLOBALS["URl"]?>addmons.php">Add mons</a></li>
                    <li><a href="<?= $GLOBALS["URl"]?>addmoves.php">Add moves</a></li>
                <?php
                }
            ?>
                <li><a href="<?= $GLOBALS["URl"]?>logout.php">Logout</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>