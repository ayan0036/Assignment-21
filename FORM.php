 <html>
<head>
<title>form</title>
</head>
<body>

<?php 
$name = $email = $phone = "";
$emname = $ememail = $emphone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["name"])) {
      $emname = "Name required";
    } else {
      $name = check_validation($_POST["name"]);
      echo $name ;
    }

    if(empty($_POST["Email"])) {
      $ememail = "Email required";
    } else {
      $email = check_validation($_POST["Email"]);
      echo $email;

    } 

    if(empty($_POST["phoneno"])) {
      $emphone = "Phone number required";
    } else {
      $phone = check_validation($_POST["phoneno"]);
      echo $phone;
    } 
}

function check_validation($input) {
  $input = trim($input); // remove back space 
  $input = stripslashes($input);  // remove back /
  $input = htmlspecialchars($input); // specail charactor like < ,> conveted into &lt and &gt
  return $input; 
}


   /* $_SERVER is a goloble variable that is return the current file name , server name */


     /*  POST-method is used to pass input value in the another file.  the value inside the http request body. we can unlimited character pass. it is more secure and used for 
     sensative data like password , pins etc*/

     /*get-mathod is used to pass input value from the browser address bar  it less secure from the post-mathod.
     the get-mathod allows only 2000 charactor only */






?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<label> NAME:
<input type="text" name="name" value="<?php echo $name; ?>">
<span class="error">* <?php echo $emname;?></span>
</label>
<br>

<label> Email:
<input type="text" name="Email" value="<?php echo $email; ?>">
<span class="error">* <?php echo $ememail;?></span>
</label>
<br>

<label>Phone Number:
<input type="text" name="phoneno" value="<?php echo $phone; ?>">
<span class="error">* <?php echo $emphone;?></span>
</label>
<br>

<button type="submit">submit</button>

</form>

</body>
</html>
