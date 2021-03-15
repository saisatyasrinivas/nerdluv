<html>
    <head>
    <link rel="stylesheet" href="./nerdluv.css">
    </head>
        <body>
            <img src="./nerdluv.png"/>
            <p> where meek geeks meet</p>
            <br/><br/>
            <form action="signup-submit.php" method="POST">
            <fieldset>
                <legend>
                    New User Signup:
                </legend>
                name: 
                <input type="text" name="name" maxlength="100" size="16"/><br/><br/>
                Gender: 
                <input type="radio" id="male" name="gender" value="M"/>
                <label for="male">Male</label>
                <input type="radio" id="Female" name="gender" value="F" checked/>
                <label for="Female">Female</label><br/><br/>
                age: 
                <input type="number" name="age" style="width: 6em;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" /><br/><br/>
                Personality type: 
                <input type="text" name="personality" size="6" maxlength="4"/>
                <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a><br/><br/>
                Favorite OS: 
                <select name="os">
                    <option>Windows</option>
                    <option>MAC OS X</option>
                    <option>Linux</option>
                </select><br/><br/>
                Seeking age: 
                <input type="text" name= "seeking" size="6" maxlength="2" placeholder="min"/>
                to
                <input type="text" name="seeking2" size="6" maxlength="2" placeholder="max"/><br/><br/>
                <label>Seek Gender(s):  </label>
                <input type="checkbox" name="male" id="male_id" checked/>
                <label for="male_id">Male</label>
                <input type="checkbox" name="female" id = "female_id" />
                <label for="female_id">Female</label>
                <br/><br/>
                <input type="submit" name="submit" value="Sign Up"/>
            </fieldset>
            </form>
            <?php include './common.php';
              echo common();?>
        </body>
</html>