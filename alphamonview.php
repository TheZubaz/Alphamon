        <?php
        include('./header.php');
        $mon = alphamon::Get($_GET['id']);
        ?>

        <main class="wrapper">
        <?php
            if (user::levelCheck(2)) {
            ?>
            <form action="" method="post">
            <?php
                if (isset($_POST["Delete"])){
                    ?>Are you sure you want to delete this alphamon?<input class="btn btn-danger" type="submit" name="Del" value="yes" /><?php 
                }else{
                    ?> <input type="submit" name="Delete" value="Delete" /><?php
                }
            ?>
            </form>
            <?php } ?>
            <div class="discription">
                <div class="disc-item first">
                    <img class="monPic" src="./images/mons/<?=$mon[0]['Name']?>.png" alt="<?=$mon[0]['Name']?>"> 
                </div>
                <div class="disc-item second">
                    <p>
                        Name: <?=$mon[0]['Name']?><br> 
                        Type: <img class="type" src="./images/type/<?=alphamon::convertType($mon[0]['Type'])?>.png"><br>
                        Description: <?=$mon[0]['Description']?><br> 
                        Weaknesses:<br>
                        <?php
                        foreach (alphamon::weakness(alphamon::convertType($mon[0]['Type'])) as $weakness) {
                            ?><img class="type" src="./images/type/<?=$weakness?>.png"><?php
                        }
                        ?>
                        <br>
                        Resistances:<br>
                        <?php
                        if ($mon[0]['Type'] != 1) {
                            foreach (alphamon::Resistance(alphamon::convertType($mon[0]['Type'])) as $Resistance) {
                                ?><img class="type" src="./images/type/<?=$Resistance?>.png"><?php
                            }
                        }
                        ?>
                        <br>
                        Immunities:<br>
                        <?php
                        if ($mon[0]['Type'] == 1 || $mon[0]['Type'] == 8 || $mon[0]['Type'] == 9 || $mon[0]['Type'] == 11) {
                            foreach (alphamon::immune(alphamon::convertType($mon[0]['Type'])) as $immune) {
                                ?><img class="type" src="./images/type/<?=$immune?>.png"><?php
                            }
                        }
                        ?>
                    </p>
                </div>
                <div class="disc-item">
                    <p>
                        HP: <?=$mon[0]['HP']?><br>
                        Attack: <?=$mon[0]['Attack']?><br>
                        Defense: <?=$mon[0]['Defense']?><br>
                        Special attack: <?=$mon[0]['Special_Attack']?><br>
                        Special Defense: <?=$mon[0]['Special_Defense']?><br>
                        Speed: <?=$mon[0]['Speed']?>
                    </p>
                </div>
                <div class="disc-item movelink last">
                    <p>
                        Moves:<br>
                        <?php foreach (koppel::getMoves($_GET['id']) as $moves) {
                            ?><a href="<?= $GLOBALS["URl"] . "moveview.php?id=" . $moves['MovesID']?>"><?=$moves['Name']?></a><br><?php
                        } ?>
                    </p>
                </div>
            </div>  
        </main>

        <?php
             if (isset($_POST["Del"])){

                if(alphamon::Delete($_GET['id'])) {
                    header('Location: ' . $GLOBALS["URl"] . "alphamons.php");
                } else {
                    header('Location: ' . $GLOBALS["URl"] . "error.php");
                }
            }
        ?>  
    </body>
</html>