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
            //Name validation
            //number 0-99
            //gender male or female only
            // I/E, N/S, F/T, J/P
            //OS provided only
            //MIN/MAX 0-99 & MIN is <= MAX
            $p1 = (substr($_POST["personality"],-4,1));
            $p11 = ($p1 != "i" and $p1 != "I" and $p1 != "e" and $p1 != "E");
            $p2 = (substr($_POST["personality"],-3,1));
            $p22 = ($p2 != "n" and $p2 != "N" and $p2 != "S" and $p2 != "s");
            $p3 = (substr($_POST["personality"],-2,1));
            $p33 = ($p3 != "f" and $p3 != "F" and $p3 != "T" and $p3 != "t");
            $p4 = (substr($_POST["personality"],-1,1));
            $p44 = ($p4 != "j" and $p4 != "J" and $p4 != "P" and $p4 != "p");
            $seek = ($_POST["seeking"]<0 || $_POST["seeking"]>99);
            $seek2 = ($_POST["seeking2"]<0 || $_POST["seeking2"]>99);
            $seekl = ($_POST["seeking"] > $_POST["seeking2"]);

            $failed = false;

            if(empty($_POST["name"])){
                $failed = call_error("Please enter the name");
            }
            if(check_name($_POST["name"]))
            {
                $failed = call_error("User name already exists, please enter another name");
            }
            if($_POST["age"]<0 || $_POST["age"]>99){
                $failed = call_error("Please enter a valid date");
            }
            if(!($_POST["gender"]=="M" || $_POST["gender"]=="F")){
                $failed = call_error("Please select the gender");
            }
            if($p11 or $p22 or $p33 or $p44){
                $failed = call_error("Please enter a valid personlaity type");
            }
            if(!($_POST["os"] == "Windows" or $_POST["os"] == "MAC OS X" or $_POST["os"] == "Linux")){
                $failed = call_error("Please select a valid OS");
            }
            if($seek or $seek2 or $seekl){
                $failed = call_error("Please enter a valid seeking age");
            }
            if(!isset($_POST["male"]) and !isset($_POST["female"])){
                $failed = call_error("Please select atleast one seekign gender");
            }
            if(!$failed){
                $gender = "";
                if(isset($_POST["male"]) and $_POST["male"] == "on"){
                    $gender = $gender."M";
                }
                if(isset($_POST["female"]) and $_POST["female"] == "on"){
                        $gender = $gender."F";
                    }

                    $userData = $_POST["name"]
                        .",".$_POST["gender"]
                        .",".$_POST["age"]
                        .",".$_POST["personality"]
                        .",".$_POST["os"]
                        .",".$_POST["seeking"]
                        .",".$_POST["seeking2"]
                        .",".$gender;

                    file_put_contents("singles.txt", $userData."\n", FILE_APPEND);
            }
        ?>

         <div>
            <h1>Thank you!</h1>
            <p>
                 Welcome to NerdLuv, <?= $_POST["name"] ?>!<br /><br />
               Now <a href="matches.php">log in to see your matches!</a>
             </p>
            <?php 
                common();
            ?>
        </div>     
    </body>
</html>