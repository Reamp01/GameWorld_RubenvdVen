<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="CSS/css.css" />
    <title>GameWorld</title>
</head>

<body>
    <header>
        <?php 
                include 'Paginas/Elementen/Navigation_GameWorld.php';
            ?>
        <div id="logo">
            <h1 id="logo_text">GameWorld</h1>
        </div>
    </header>
    <div id="mainDiv">
        <div id="mainDiv_Color">
            <div id="home_banner_div">
                <h2>De nummer 1 game-website <br /> van: Nederland & België</h2>
            </div>
        </div>

        <br />
        <br />

        <div id="console_buttons">
            <div id="ps4_button" class="console_button_class">
                <a href='Paginas/Games_Pagina.php?gameconsole=PS4'>
                    <img src="Afbeeldingen/ps4logo.png">
                    <h6>PS4</h6>
                </a>
            </div>
            <div id="xbox_button" class="console_button_class">
                <a href='Paginas/Games_Pagina.php?gameconsole=X-BOX'>
                    <img src="Afbeeldingen/xbox_logo.png">
                    <h6>X-BOX</h6>
                </a>
            </div>
            <div id="pc_button" class="console_button_class">
                <a href='Paginas/Games_Pagina.php?gameconsole=PC'>
                    <img src="Afbeeldingen/windows_logo.png">
                    <h6>PC</h6>
                </a>
            </div>
            <div id="switch_button" class="console_button_class last_console_button_class">
                <a href='Paginas/Games_Pagina.php?gameconsole=NS'>
                    <img src="Afbeeldingen/switch_logo.png">
                    <h6>Nintendo <br /> Switch</h6>
                </a>
            </div>
            <div class="clear_fix">

            </div>
        </div>
        <?php 
        include 'Paginas/Elementen/Footer_GameWorld.php'
    ?>
    </div>
</body>

</html>