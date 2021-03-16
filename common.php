<?php
    function common(){
        echo "<p> This page is for single nerds to meet and date each other! Type in <br/> your personal information and wait for the nerdly luv to begin! <br/> Thank you for using our site.<br/><br/> Results and page (C) Copyright NerdLuv Inc. </p>";
        echo "<img src= './back.png' alt='icon'/> <a href='index.php'>Back to front page</a>";
        echo "<br/><br/><img src= './html.png' alt='icon'/> <img src= './css.png' alt='icon'/>";
    }
    function check_name($username){
        // explode (strings - array) from singles.txt
        // Retrieving username from the array element
        // matching the usernames 
        // returning if true or false

        $userelement = explode("\n", file_get_contents('./singles.txt'));
        foreach($userelement as $subelement){
            $almostname = explode(",", $subelement );
            if($almostname[0] == $username){
                return true;
            }
        }
        return false;

    }
    function getuserdata($username){
        $userelement = explode("\n", file_get_contents('./singles.txt'));
        foreach($userelement as $subelement){
            $almostname = explode(",", $subelement );
            if($almostname[0] == $username){
                return $almostname;
            }
        }
    }
    function getmatches($individualdata){
        $individual = explode("\n", file_get_contents('./singles.txt'));
        $matchdata = array();
        foreach($individual as $subindividual){
            $almostdone = explode(",", $subindividual);
            if($individualdata[0] == $almostdone[0] or count($almostdone) != 8){
                continue;
            }
            // conditions
            $gendercond1 = strpos($individualdata[7], $almostdone[1]) !== false;
            $gendercond2 = strpos($almostdone[7],$individualdata[1]) !== false;
            $oscondi = ($almostdone[4] == $individualdata[4]);
            $agecondi1 = ($almostdone[2]>= $individualdata[5] and $almostdone[2]<= $individualdata[6]);
            $agecondi2 = ($individualdata[2]>= $almostdone[5] and $individualdata[2]<= $almostdone[6]);
            $personalitycondi = personalitycheck($almostdone[3],$individualdata[3]);
            if($gendercond1 and $gendercond2 and $oscondi and $agecondi1 and $agecondi2 and $personalitycondi){
                array_push($matchdata,$almostdone);
            }
        }
        return $matchdata;
    }

    function personalitycheck($stringmatch1, $stringmatch2){
        $count = 0;
        while($count < 4){
            if(substr($stringmatch1,$count,1) == substr($stringmatch2,$count,1)){
                return true;
            }
            $count++;
        }
        return false;
    }

    function finalpull($nerddata){
        return "<div class='match'>
        <p><img src='user.jpg' alt='user icon' />
        " . $nerddata[0] . "</p>
        <ul>
            <li><strong>gender:</strong>" . $nerddata[1] . "</li>
            <li><strong>age:</strong>" . $nerddata[2] . "</li>
            <li><strong>type:</strong>" . $nerddata[3] . "</li>
            <li><strong>OS:</strong>" . $nerddata[4] . "</li>                        
        </ul>
        </div>";
    }

    function call_error($message){
        header("Location:error.php?error=".rawurlencode($message));
        return true;
    }

?>