        <?php
        include('./header.php');
        ?>

        <main class="wrapper">
            <div class="moves">
                <div class="move-item tableheader">
                    <p>Name</p>
                </div>
                <div class="move-item tableheader">
                    <p>Type</p>
                </div>
                <div class="move-item tableheader">
                    <p>Category</p>
                </div>
                <?php
                foreach (move::Getall() as $move) {
                    ?>
                        <div class="move-item">
                            <p><a href="<?= $GLOBALS["URl"] . "moveview.php?id=" . $move['ID']?>"><?=$move['Name']?></a></p>
                        </div>
                        <div class="move-item">
                            <p><img class="type" src="./images/type/<?=move::convertType($move["Type"])?>.png"></p>
                        </div>
                        <div class="move-item">
                            <p><img class="type" src="./images/type/<?=move::convertCategory($move["Category"])?>.png" title="<?=move::convertCategory($move["Category"])?>"></p>
                        </div>
                    <?php
                }
                ?>
            </div>
        </main> 
    </body>
</html>