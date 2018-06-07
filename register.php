
<html>  
<head>
<title>
	Register
</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/registerStyle.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="javascript/myscripts.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
    
<body>
 <script type="text/javascript" >
     $(document).ready(function () {
            $("#filter-date").datepicker({
                dateFormat: 'mm/dd/yy'
            });
        });
</script> 
    
<div id="registerTitle">
    Welcome to the Registration
</div>    
<?php 
    $gender="";
    $username_error="";
    $password_error="";
    $repassword_error="";
    $firstname_error ="";
    $lastname_error ="";
    $address1_error="";
    $city_error="";
    $state_error="";
    $zipcode_error="";
    $phone_error="";
   
    $email_error= "";
    $gender_error="";
    $birthdate_error= "";
    $marriage_error="";
    $num_errors = 0;
    
    
    
    if(!empty($_POST['reset'])){
        header("Location: register.php");
        exit(1);
    }
    
    if(!empty($_POST['submitted'])){
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $repassword = trim($_POST['repassword']);
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $address1 = trim($_POST['address1']);
        $address2 = trim($_POST['address2']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $zipcode = trim($_POST['zipcode']);
        $gender = trim($_POST['gender']);
        $marriage= trim($_POST['marriage']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $birthdate = trim($_POST['birthdate']);
        
        if(empty($username)){
            $username_error = 'Username is empty';
            $num_errors++;
        }elseif(strlen($username) < 6){
            $username_error = 'Username must be at least 6 characters';
            $num_errors++;
        }
        
        if(empty($password)){
            $password_error = 'Password is empty';
            $num_errors++;
        }elseif(strlen($password) < 8){
            $password_error = 'Password must be at least 8 characters';
            $num_errors++;
        }elseif((strtolower($password) == $password)){
            $password_error = 'Password must have an uppercase letter';
            $num_errors++;
        }elseif((strtoupper($password) == $password)){
            $password_error = 'Password must have a lowercase letter';
            $num_errors++;
        }elseif(!preg_match('/\\d/', $password)){
            $password_error = 'Password must contain a number';
            $num_errors++;
        }elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)){
            $password_error = 'Password must contain a special character';
            $num_errors++;
        }
        
        if(empty($repassword)){
            $repassword_error = 'Password repeat is empty';
            $num_errors++;
        }elseif(strcmp($password, $repassword) != 0){
            $repassword_error = 'Passwords do not match';
            $num_errors++;
        }
        if(empty($firstname)){
            $firstname_error = 'First name is empty';
            $num_errors++;
        }
        if(empty($lastname)){
            $lastname_error = 'Last name is empty';
            $num_errors++;
        }
        if(empty($address1)){
            $address1_error = 'Address is empty';
            $num_errors++;
        }
        if(empty($city)){
            $city_error = 'City is empty';
            $num_errors++;
        }
        if(empty($state)){
            $state_error = 'State is empty';
            $num_errors++;
        }
        if(empty($zipcode)){
            $zipcode_error = 'Zipcode is empty';
            $num_errors++;
        }elseif(strlen($zipcode) < 5){
            $zipcode_error = 'Zipcode must be at least 5 numbers';
            $num_errors++;
        }
        if(empty($phone)){
            $phone_error = 'Phone is empty';
            $num_errors++;
        }
        if(empty($email)){
            $email_error = 'Email is empty';
            $num_errors++;
        }
        if(empty($birthdate)){
            $birthdate_error = 'Birthday is empty';
            $num_errors++;
        }
    
        //display the number of errors or go to the success page
        if($num_errors==1){

            echo "<span class='error_warning'>" . "You have $num_errors error to correct". "</span>";
        }else if($num_errors > 1){
             echo "<span class='error_warning'>" . "You have $num_errors errors to correct". "</span>";
        }else{
            $dbcon = mysqli_connect('localhost','root','','project');

            $sqlInsert = "INSERT INTO registration (userName, password, firstName, lastName, address1, address2, city, state, zipCode, phone, email, gender, maritalStatus, dateOfBirth) VALUES ('$username','$password','$firstname','$lastname','$address1','$address2','$city','$state','$zipcode','$phone','$email','$gender','$marriage','$birthdate')";

            $query=mysqli_query($dbcon,$sqlInsert);
            
            header("Location: success.html");
            
            exit(1);
        }
   
    }
    
?>
<div id="navigation">
    <table>
      <tr>
        <td>Favorites</td>
      </tr>
      <tr>
        <td>Order History</td>
      </tr>
      <tr>
        <td>Orders to Approve</td>
      </tr>
      <tr>
        <td>Invoice History</td>
      </tr>
      <tr>
        <td>Quotes</td>
      </tr>
      <tr>
        <td>Quick Order</td>
      </tr>
      <tr>
        <td>Manage Users</td>
      </tr>
    </table>
</div>

    
<div id="registerForm">
    <form action="" method="post">

    <label for="userName">User Name: </label>
        <input id="userName" maxlength="50" type="text" name="username" value="<?php if(isset($_POST['username'])) { echo htmlentities($_POST['username']); } ?>">
        <span class='error'>* <?php echo $username_error ?> </span><br>

    <label for="password">Password: </label>
        <input id="password" maxlength="50" type="password" name="password" value="<?php if(isset($_POST['password'])) { echo htmlentities($_POST['password']); } ?>">
        <span class='error'>* <?php echo $password_error ?> </span><br>
<div id="repass">
    <label for="repassword">Password Again: </label>
        <input id="repassword" maxlength="50" type="password" name="repassword" value="<?php if(isset($_POST['repassword'])) { echo htmlentities($_POST['repassword']); } ?>">
        <span class='error'>* <?php echo $repassword_error ?> </span><br>
</div>
    <label for="firstName">First Name: </label>
        <input id="firstName" maxlength="50" type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) { echo htmlentities($_POST['firstname']); } ?>">
        <span class='error'>* <?php echo $firstname_error ?> </span><br>
<div id="namelast">
    <label for="lastName">Last Name: </label>
        <input id="lastName" maxlength="50" type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) { echo htmlentities($_POST['lastname']); } ?>">
        <span class='error'>* <?php echo $lastname_error ?> </span><br>
</div>
    <label for="address1">Address Line 1: </label>
        <input id="address1" maxlength="100" type="text" name="address1" value="<?php if(isset($_POST['address1'])) { echo htmlentities($_POST['address1']); } ?>">
        <span class='error'>* <?php echo $address1_error ?> </span><br>
<div id="addressSecond">
    <label for="address2">Address Line 2: </label>
        <input id="address2" maxlength="100" type="text" name="address2" value="<?php if(isset($_POST['address2'])) { echo htmlentities($_POST['address2']); } ?>">
        <br>
</div>
    <label for="city">City: </label>
        <input id="city" maxlength="50" type="text" name="city" value="<?php if(isset($_POST['city'])) { echo htmlentities($_POST['city']); } ?>">
        <span class='error'>* <?php echo $city_error ?> </span><br>
<div id="stateResidence">
    <label for="state">State: </label>
        <input id="state" maxlength="52" type="text" name="state" value="<?php if(isset($_POST['state'])) { echo htmlentities($_POST['state']); } ?>">
        <span class='error'>* <?php echo $state_error ?> </span><br>
</div>
    <label for="zipcode">Zipcode: </label>
        <input id="zipcode" maxlength="10" type="text" name="zipcode" value="<?php if(isset($_POST['zipcode'])) { echo htmlentities($_POST['zipcode']); } ?>">
        <span class='error'>* <?php echo $zipcode_error ?> </span><br>

    <label for="phone">Phone Number: </label>
        <input id="phone" maxlength="12" type="text" name="phone" value="<?php if(isset($_POST['phone'])) { echo htmlentities($_POST['phone']); } ?>">
        <span class='error'>* <?php echo $phone_error ?> </span><br>
<div id="emailAddress">
    E-mail: <input type="text" maxlength="255" name="email" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']); } ?>">
        <span class='error'>* <?php echo $email_error ?> </span><br><br>
</div>
    <?php if(empty($gender)){ $gender="male"; } ?>
    <label for="gender">Gender: </label><span class='error'>* <?php echo $gender_error ?> </span><br>
        <label for="male">Male </label>
        <input type="radio" name="gender" value="male" id="male" checked="checked" >
        <label for="female">Female </label>
        <input type="radio" name="gender" value="female" id="female"><br><br>

<div id="marriageStatus">
    <label for="marriage">Marital Status: </label><span class='error'>* <?php echo $marriage_error ?> </span><br>
        <label for="married">Married </label>
        <input type="radio" name="marriage" value="married" id="married"><br>
        <label for="single">Single </label>
        <input type="radio" name="marriage" value="single" id="single" checked="checked"><br>
        <label for="divorced">Divorced </label>
        <input type="radio" name="marriage" value="divorced" id="divorced"><br>
        <label for="widow">Widowed </label>
        <input type="radio" name="marriage" value="widow" id="widow"><br>
</div>

    Birth Date: <input type="text" name="birthdate" id="datepicker" value="<?php
        if(isset($_POST['birthdate'])) { echo htmlentities($_POST['birthdate']); } ?>">
        <span class='error'>* <?php echo $birthdate_error ?> </span><br>

    <input type="submit" name="submitted" id="submit" value="Submit" onclick="validateRegister();"><br>

    
    <input type="submit" name="reset" value="Reset" id="reset"/>


    </form>
</div>
    
</body>
</html>