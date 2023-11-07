
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
body{
  background-color:#f1f1f1;
  font-family:Arial,sans-serif;
}



.container{
  width:35%;
  margin:auto;
  padding:20px;
  background-color:#ffff;
  border-radius:5px;
  box-shadow:2px;

}
h1{
  text-align:center;
  margin-bottom:2px;
}
.from{
  
  margin-bottom:20px;
}
label{
  
            
 display:block;
  font-weight:bold;
  margin-bottom:5px;
  padding-left:10px;
  
}
input[type="text"],
input[type="email"],
input[type="password"],
input[type="address"]
 
{
width:50%;

padding: 7px 4px ;
margin-top:6px;

outline:none;
background-color:#e9ecef;


}
button[type="submit"]{
  font-family:Arial,sans-serif;
  
  cursor:pointer;
  color:white;
  width:20%;
  height:30px;
  outline: none;
  border:none;
  background-color :blue;
}
button[type="button"]{
  cursor:pointer;
  color:black;
  width:20%;
  height:30px;
  background-color : blue;
}
@media screen and (max-width: 800px) {
  .container, .from,button[type="button"],button[type="submit"],input[type="text"],
input[type="email"],
input[type="password"],label {
    width: 100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
}

</style>
</head>
<body>


<?php

//if($_POST){
//if($_SERVER["REQUEST_METHOD"]=="POST"){
    //retrive from data
    if (isset($_POST["Register"])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    
// validate input

if(empty($name)||empty($email)||empty($password)||empty($address)||empty($phone)){
    echo "please fill all the fields";

}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "please enter a valid email";
}
else{

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="login_register";

//create a connection
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

//die if connection was not successful
if(!$conn){
    die("sorry we failed to connect: " . mysqli_connect_error());
}
else{
    echo "connection was successful<br>";
   // header("Location:logout.php");
}


$sql = "INSERT INTO users (name, email, password, address, phone) VALUES ('$name', '$email', '$password', '$address', '$phone')";

$result= mysqli_query($conn, $sql);


//check for the database creation success
if($result){

    echo "the recored successfully !<br>";
    echo "<script>window.open('login.php','_self')</script>";
    }else{
    echo "the recored does not successfully because of this error-->" . mysqli_error($conn);
    } 
   
    mysqli_close($conn);
   echo "registration successfull";
}
}
?>
<div class="container">
        <h1>Register</h1>
        
<form method="post" action="" >
    <div class="from">
        
        <label from="username">
        <p align="center"><b>Name:</b></label>
            <input type="text" placeholder="enter name" name="name" id="name" required>

</p>
</div>
            
        
         
          <label from="email"><p align="center">
                <b>Email:</b></label>
                <input type="Email" placeholder="enter email address" name="email" id="email" required>

</p>

    
<p align="center">  <label for="address"><p align="center"><b>Password:</b></label>
<input type="password" placeholder="enter password" name="password" id="password" required></p>
      
 <p align="center">  <label for="address"><p align="center"><b>Address:</b></label>
<input type="text" placeholder="enter address" name="address" id="address" required></p>


<p align="center">  <label for="address"><p align="center"><b>Phone:</b></label>
<input type="text" placeholder="enter phone" name="phone" id="phone" required></p>


       
<p align="center"><button type="submit" name="Register">Register</button></p>
</form> 
</div>
</body>
</html>