<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "gameworld";

$gameconsole = "PS4' OR game_console='X-BOX' OR game_console='PC' OR game_console='NS";

    if(isset($_GET['gameconsole']))
    {
        $gamecat = $_GET['gameconsole'];
    }
    else {
        $gamecat = 0;
    }

    if ($gamecat == true)
    {
        $gameconsole = htmlspecialchars($_GET["gameconsole"]);
    }

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

    $sql = "select * from games where game_console='$gameconsole' ORDER BY game_description";
    $result = mysqli_query($conn, $sql);

    $games = array();

        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $games[] = $row;
            }
        }
        mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <title>GameWorld</title>
    <script>
        function Scrolling() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 85) 
            {
                document.getElementById("gamespagina_subheader").style.position = "fixed";
                document.getElementById("gamespagina_subheader").style.top = "0px";
                document.getElementById("gamespagina_subheader").style.left = "10.5%";
            } 
            else 
            {
                document.getElementById("gamespagina_subheader").style.position = "relative";
                document.getElementById("gamespagina_subheader").style.top = "0px";
                document.getElementById("gamespagina_subheader").style.left = "0px";
            }
        }

        window.onscroll = function () {
            Scrolling();
        };
    </script>
</head>

<body>
    <?php 
        if(!isset($_GET['game_id']))
        { 
    ?>
    <header>
        <?php 
                    include 'Elementen/Navigation_GameWorld_Sub_Pages.php';
            ?>
        <div id="logo">
            <h1 id="logo_text">
                <a href="../GameWorld.php">
                    GameWorld
                </a>
            </h1>
        </div>
    </header>
    <div id="gamespagina_subheader">
        <ul>
            <li>
                <a href="Games_Pagina.php?gameconsole=NS" id="see_ns">
                    Nintendo-Switch
                </a>
            </li>
            <li>
                <a href="Games_Pagina.php?gameconsole=PC" id="see_pc">
                    Computer
                </a>
            </li>
            <li>
                <a href="Games_Pagina.php?gameconsole=X-BOX" id="see_xbox">
                    X-BOX One
                </a>
            </li>
            <li>
                <a href="Games_Pagina.php?gameconsole=PS4" id="see_ps4">
                    Playstation 4
                </a>
            </li>
            <li>
                <a href="Games_Pagina.php" id="see_platforms">
                    Alle Platformen
                </a>
            </li>
        </ul>
        <h3>Ik wil games voor:</h3>
    </div>
    <?php
        }
    ?>
    <div id="mainDiv_Games_Pagina">
        <div id="mainDiv_Color">


            <?php
                foreach($games as $key => $game)
                {
                    $console = $game['game_console']; 
                    if ($console == 'PS4') { $bkcolor = "rgb(0,55,145)"; }
                    if ($console == 'X-BOX') { $bkcolor = "rgb(16, 124, 16)"; }
                    if ($console == 'PC') { $bkcolor = "rgb(44,44,44)"; }
                    if ($console == 'NS') { $bkcolor = "rgb(168,0,28)"; }
            ?>

            <div class="product_item">

                <div class="gameprice_div" style="background-color: <?php echo $bkcolor; ?>;">
                    <img src="../Afbeeldingen/shopping_cart.png" class="shopping_cart">
                    <h3>
                        &euro;
                        <?php echo $game['game_price']; ?>
                    </h3>
                </div>

                <img src="../Afbeeldingen/Games/<?php echo $game['game_image']; ?>" class="product_item_image" />

                <h2>
                    <?php echo $game['game_title']; ?>
                </h2>

                <div class="order_div" style="background-color: <?php echo $bkcolor;?>;">
                    <form action="Elementen/Order_Prossesing_GameWorld.php" method="POST" class="product_form">
                        <input type="hidden" name="game_id" value="<?php echo $game['game_id'];?>">
                        <input type="submit" value="Bestel Dit Spel " class="order_form" style="background-color: <?php echo $bkcolor; ?> ">
                    </form>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <?php 
        include 'Elementen/Footer_GameWorld.php'
    ?>
    </div>
</body>

</html>