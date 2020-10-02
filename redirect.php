
<?php

require("./database.php");



$connection = connectDb("localhost","root","","test_db_2");

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['txt_username']))
{

$result= signInUser($connection,"users",$_POST["txt_password"],$_POST["txt_username"]);
if($result==-1)
{
alert("password is wrong");
header("Location: welcome.html");
}
else if($result==-2)
{
alert("user does not exist");
$result2 = addUser($connection, "users", $_POST["txt_password"], $_POST["txt_username"]);
if(result==-1) {
alert("user Exists");
header("Location: welcome.html");
} else if (result == 1)
{
alert("added successfully");
$url = "signin.php? txt_username=".$_POST["txt_username"];
header("Location: $url");
}

}
else if ($result==1){
alert("signed in");
$_GET["txt_username"] = $_POST["txt_username"];
$_GET["txt_password"] = $_POST["txt_password"];
echo $_GET["txt_username"];

$url = "sigin.php? txt_username=".$_GET["txt_username"];
header("Location: $url");
echo "string";
}
}
?>
