<?php

session_start();

$total = 0;
$servername = "localhost";
$username = "root";
$password = "";
$database = "gameworld";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        if(isset($_SESSION['Basket']))
        {
            $sql = "select * from games where game_id IN (" . implode(", ", $_SESSION['Basket']). ");";
        }

        else
        {
            $sql = "select * from games where game_id='0'";
        }

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
</head>

<body>
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
    <div id="mainDiv">
        <div id="mainDiv_Color" style=" padding: 40px; color: white; font-size: 20px;">
            <table class="game_order_title">
                <thead>
                    <tr>
                        <th>Foto: </th>
                        <th>Naam:</th>
                        <th>Beschrijving:</th>
                        <th>Console:</th>
                        <th>Prijs:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                                              
                            foreach($games as $key => $game)
                            {
                                if($game['game_console'] == 'PS4')
                                {
                                    $background_item = 'rgb(0,55,145)';
                                }
                                if($game['game_console'] == 'X-BOX')
                                {
                                    $background_item = 'rgb(16, 124, 16)';
                                }
                                if($game['game_console'] == 'PC')
                                {
                                    $background_item = 'rgb(44,44,44)';
                                }
                                if($game['game_console'] == 'NS')
                                {
                                    $background_item = 'rgb(168,0,28)';
                                }

                                echo "<tr style='background-color: $background_item; opacity: 0.8;'>";

                                echo "<td>";
                                echo "<img class='gameimage_checkout' src='../Afbeeldingen/Games/";
                                echo $game['game_image'];
                                echo "'";
                                echo "</td>";

                                echo "<td>";
                                echo $game['game_title'];
                                echo "</td>";

                                echo "<td class='gamedesc_checkout'>";
                                echo $game['game_description'];
                                echo "</td>";

                                echo "<td>";
                                echo $game['game_console'];
                                echo "</td>";

                                echo "<td> &euro; ";
                                echo $game['game_price'];
                                echo "</td>";

                                echo "</tr>";

                                $total = $total + $game['game_price'];
                            }
                        ?>
                <tfoot>
                    <tr>
                        <td colspan="4">Total:</td>
                        <td><?php if(!$total == 0) {echo "&euro;" . " " . $total;} ?></td>
                    </tr>
                </tfoot>
            </table>
            <br />
            <a href="Elementen/Delete_Basket_GameWorld.php">
                <h2 id="Basket_Cleaner_Button">Klik hier om je winkelmandje te resetten.</h2>
            </a>
        </div>
    </div>
    <?php
        include 'Elementen/Footer_GameWorld.php';
    ?>
</body>

</html>