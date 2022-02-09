<?php include '/xampp/htdocs/shop/classes/customer.php'; ?>
<?php 
    $cus = new customer();
    if (isset($_POST['submit'])) {
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    
        $cus_name=$_POST['name'];
        $cus_email=$_POST['email'];
        $cus_pass=$_POST['psw'];
        $cus_pass1=$_POST['psw-repeat'];
        $cus_phone=$_POST['phone'];
        $cus_address=$_POST['address'];
    
        if($cus_pass!=$cus_pass1)
        {
            echo "<span>mat khau ko trung nhau</span>";
        }
        else 
        {
          $cus_insert=$cus->register_cus($cus_name,$cus_email,$cus_pass,$cus_phone,$cus_address);
          header('Location:./index.php');
          echo $cus_insert;

        }
       
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: gray;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  width: 50%;
  margin: auto;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" pattern="[A-Za-z]+" required >

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <label for="phone"><b>Phone</b></label>
    <input type="text" placeholder="Enter Phone" name="phone" id="phone" pattern="[0-9]+"required>
    
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" id="address" required>
    <hr>

    <input type="submit" value="Register" class="registerbtn" name="submit">
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="./login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
