        <?php
        include('./header.php');
        ?>

        <main class="wrapper">
            <div class="alphamons">
            <?php
                foreach (alphamon::Getall() as $mon) {
                    ?>
                        <div class="alphamon">
                            <a href="<?= $GLOBALS["URl"] . "alphamonview.php?id=" . $mon['ID']?>" >
                            <img class="mon-pp" src="./images/mons/pp<?=$mon['Name']?>.png" alt="<?=$mon['Name']?>"> 
                            <?= $mon['Name']?>
                        </a>
                        </div>
                    <?php
                }
            ?>  
            </div>
        </main>
    </body>
</html>