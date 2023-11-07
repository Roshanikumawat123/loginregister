
<?php
//session_start();

if( isset($_SESSION['username']) ){ 
   // print "<pre>"; print_r($_SESSION); print "</pre>";
    //exit("already logged in"); 
}

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="dbrosh7";

//create a connection
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("sorry we failed to connect: " . mysqli_connect_error());



if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];


$sql=mysqli_query($conn,"SELECT * FROM `users` WHERE username='$username' AND psw='$password'");
$result=mysqli_fetch_array($sql);
/*if(mysqli_num_rows($result)==1){
echo "login successfull";
}else{
    echo "login failed";
}*/
if(is_array($result)){
    $_SESSION['username']=$result['username'];
    //$_SESSION['psw']=$result['psw'];
    $_SESSION['user_id']=$result['id'];
    
    //exit("<script>alert('yes');</script>");
   // alert("yes");
   echo "<script>alert('yes');</script>";

   
   // header("Location:myprofile.php");


}else{
//echo "login failed";

 exit("<script>alert('login failed');</script>");

}

}
?>
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
    width: 35%;
    margin: auto;
     padding:20px;
  background-color:#ffff;
  border-radius:5px;
  box-shadow:2px;
}
input[type="text"],

input[type="password"]
 
{
width:45%;
padding: 7px 4px ;
margin-top:6px;
border : 1px;
outline:none;
background-color:#e9ecef;

}
input[type="submit"]{
cursor:pointer;
  color:black;
  width:20%;
  height:30px;
  background-color : blue;
}

</style>


</head>
<body>

<div class=container>
<h1 align="center">Login</h1>

<form  method="post"  action="">
     <label from="username"><p align="center">
            <b>Username:</b></label>

            <input type="text" placeholder="enter username" name="username" id="username">
</p>
<label from="pass"><p align="center">
                <b>Password:</b></label>
                <input type="password" placeholder="enter password" name="password" id="password">
             </p>
<p align="center">
    <input type="submit" name="login" value="Login">
</p>

</form>
<div>
</body>
</html>