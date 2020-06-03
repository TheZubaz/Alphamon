        <?php
        include('./header.php');
        $move = move::Get($_GET['id']);
        ?>

        <main class="wrapper">
            <?php
            if (user::levelCheck(2)) {
            ?>
            <form action="" method="post">
            <?php
                if (isset($_POST["Delete"])){
                    ?>Are you sure you want to delete this move?<input class="btn btn-danger" type="submit" name="Del" value="yes" /><?php 
                }else{
                    ?> <input type="submit" name="Delete" value="Delete" /><?php
                }
            ?>
            </form>
            <?php } ?>
            <div class="move-disc">
                <div class="move-discitem">
                    <p>Name: <?=$move[0]['Name']?></p>
                </div>
                <div class="move-discitem">
                    <p>Power: <?=$move[0]['Power']?></p>
                </div>
                <div class="move-discitem">
                    <p>Description: <?=$move[0]['Description']?></p>
                </div>
                <div class="move-discitem">
                    <p>Type: <img class="type" src="./images/type/<?=move::convertType($move[0]["Type"])?>.png"></p>
                </div>
                <div class="move-discitem">
                    <p>Catergory: <img class="type" src="./images/type/<?=move::convertCategory($move[0]["Category"])?>.png" title="<?=move::convertCategory($move[0]["Category"])?>"></p>
                </div>
                <div class="move-discitem">
                    <p>Status: <?=move::convertStatus($move[0]['Status']) . ", " . $move[0]['StatusChance']?>%</p>
                </div>
            </div>
        </main>

        <?php
            if (isset($_POST["Del"])){

                if(move::Delete($_GET['id'])) {
                    header('Location: ' . $GLOBALS["URl"] . "moves.php");
                } else {
                    header('Location: ' . $GLOBALS["URl"] . "error.php");
                }
            }
        ?>  
    </body>
</html>