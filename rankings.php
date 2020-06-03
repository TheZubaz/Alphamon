        <?php
        include('./header.php');
        ?>

        <main class="wrapper">
            <div class="ranking">
                <div class="rank-item tableheader">
                    <p>Name</p>
                </div>
                <div class="rank-item tableheader">
                    <p>Ranking</p>
                </div>
                <div class="rank-item tableheader">
                    <p>Win</p>
                </div>
                <div class="rank-item tableheader">
                    <p>Loss</p>
                </div>
                <div class="rank-item tableheader">
                    <p>Win%</p>
                </div>
                <?php
                foreach (user::Ranking() as $ranking) {
                    ?>
                        <div class="rank-item">
                            <p><?=$ranking["Username"]?></p>
                        </div>
                        <div class="rank-item">
                            <p><?=$ranking["ELO"]?></p>
                        </div>
                        <div class="rank-item">
                            <p><?=$ranking["Wins"]?></p>
                        </div>
                        <div class="rank-item">
                            <p><?=$ranking["Losses"]?></p>
                        </div>
                        <div class="rank-item">
                            <p><?=number_format(user::Winrate($ranking["Wins"], $ranking["Losses"]))."%"?></p>
                        </div>
                    <?php
                }
                ?>
            </div>
        </main>
    </body>
</html> 