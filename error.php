<html>
    <head>
        <link rel="stylesheet" href="./nerdluv.css">
    </head>
    <body>
        <img src="./nerdluv.png"/>
        <p> where meek geeks meet</p><br/><br/>
        <h3>Error! Invalid data</h3><br/>
        <p>
            We're sorry. You submitted invalid user information. Please go back and try again.
        </p>
        <?php echo "<p>Please check the error message: {$_GET["error"]}</p>" ?>
        <?php include './common.php';
               common();?>
    </body>
</html>