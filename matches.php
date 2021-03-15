<?php
    session_start();
    if(isset($_SESSION["USERNAME"])){
        header("Location:matches-submit.php?name=".rawurlencode($_SESSION["USERNAME"]));
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="./nerdluv.css">
    </head>
    <body>
        <img src="./nerdluv.png"/>
        <p> where meek geeks meet</p>
        <form action="matches-submit.php" method="get">
            <fieldset>
            <legend>Returning User:</legend>

            <ul>
            <li>
            <strong>Name:</strong>
            <input type="text" name="name" size="16" />
            </li>
            </ul>
                                    
            <input type="submit" value="View My Matches">
            </fieldset>
        </form>
        <?php 
            include './common.php';
            echo common();
        ?>
    </body>
</html>