<?php
//if "email" variable is filled out, send email
if (isset($_POST['email']))  {
  
//Email information
$admin_email = "gameworldcompanymanagement@gmail.com";
$email = $_POST['email'];
$subject = $_POST['subject'];
$comment = $_POST['comment'];
  
//send email
mail($admin_email, "$subject", $comment, "From:" . $email);
  
//Email response
echo "Thank you for contacting us!";
}
  
//if "email" variable is not filled out, display the form
else  { }
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
            <h2>Stuur een mail naar GameWorld:</h2>
            <hr />
            <form method="post">
                <p>Email:</p> <input name="email" type="text" /> <br />
                <p>Subject:</p> <input name="subject" type="text" /> <br />
                <p>Message: </p> <textarea name="comment" rows="15" cols="40"></textarea> <br /><br />
                <input type="submit" value="Submit" />
            </form>
        </div>
    </div>
    <?php 
        include 'Elementen/Footer_GameWorld.php'
    ?>
</body>

</html>