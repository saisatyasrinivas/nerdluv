<?php
    session_start();
    $_SESSION["USERNAME"] = $_GET["name"];
?>
<html>
    <head>
        <link rel="stylesheet" href="./nerdluv.css">
    </head>
        <body>
            <img src="./nerdluv.png"/>
            <p> where meek geeks meet</p>
            <br/><br/>

            <?php
                include './common.php';
                $matchusername = $_GET["name"];
                $failed = false;
                if(empty($matchusername)){
                    $failed = call_error("Please enter the username");
                }
                if(!(check_name($matchusername))){
                    $failed = call_error("Username is invalid");
                }
                if(isset($_SESSION["USERNAME"]) and $_SESSION["USERNAME"] ==  $_GET["name"] and isset($_SESSION["{$_GET["name"]}finalhtml"])){
                    echo $_SESSION["{$_GET["name"]}finalhtml"];
                }
                if(!$failed){
                    // Get username from matches.php
                    // match if the user exists in singles.txt and retrieve the data
                    //match with qualites (Opp gender, age, os, personality)
                    //store the matches in a variable
                    // create a html using stored matches
                    $nerddata = getuserdata($matchusername);
                    $matchdata = getmatches($nerddata);
                    //print_r($matchdata);
                    $finalhtml = "<h3> Matches for {$matchusername} </h3> <br/>";
                    foreach($matchdata as $finaldata){
                        $finalhtml = $finalhtml.finalpull($finaldata);
                        
                    }
                    echo $finalhtml;
                    $_SESSION["finalhtml"] = $finalhtml;
                }
                common();
            ?>
        </body>
</html>
