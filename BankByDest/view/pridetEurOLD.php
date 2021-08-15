<?php
require __DIR__ ."/virsus.php";

?>

<body>

    <!-- <nav>
    <a href="<?= URL ?>">Sąrašas</a>
    <a href="<?= URL ?>?route=nauja">Nauja sąskaita</a>
    <button onclick="location.href= '<?= URL ?>'" class="btnCreate">Gryzti i sarasa</button>
</nav> -->

    <div class="divBigPlus">

        <form action="<?= URL ?>?route=nauja" method="post">

            <div class="centr divN">
                <label class="inLbl">Sąskaitos Nr.</label>

                <input class="inBoxSask" type="hidden" name="sNr" value="<?= $sNr ?>">
                <h3 class="sNrShow"><?= chunk_split($sNr, 4) ?></h3></input>
                
            </div>

            <div class="divSmallPlus">
                <label class="inLblPlus">Vardas</label>
                <!-- <input class="inBox" type="hidden" name="vardas" value="<?= ReData("vard")["ReVard"] ?? null; ?>"> -->
                <h3 class="namePlus"><?= $saskPerson["vardas"] ?></h3></input>
                <!-- <input class="inBox" type="text" name="vardas" value="<?= $ReVard ?? null; ?>"> -->
            </div>

            <div class="divSmallPlus">
                <label class="inLblPlus ">Pavarde</label>
                <!-- <input class="inBox" type="text" name="pavarde" value="<?= ReData("pavard")["RePavard"] ?? null; ?>"> -->
                <h3 class="sNrShow"><?= $saskPerson["pavarde"] ?></h3></input>
            </div>

            <form action="" method="post">
                <div class="divSmallPlus">
                    <label class="inLblPlus">Likutis</label>
                    <h3 class="sNrShow"><?= $saskPerson["Likutis"] ?></h3></input>
                    <input class="inBox" type="text" name="ak" value="<?= ReData("ak")["ReAk"] ?? null; ?>">
                    <button type="submit" class="btnCreate btnNav">[ + ] Prideti</button>
                </div>
            </form>


            <!-- <div class="noBorder">
                <button type="submit" class="btnCreate btnNav">Sukurti naują sąskaitą</button>
            </div> -->

        </form>
    </div>

</body>
</html>