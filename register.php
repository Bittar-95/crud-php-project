<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">

<input  name="name" type="text"/>
<input name="email" type="email"/>
<input name="password" type="password"/>
<select name = "user">
<option value="u">User</option>
<option value="m">Admin</option>
</select>
<button type="submit" name="submit" value="add">ADD</button>
</form>




<?php
 $server = "localhost";
 $dbname="university";
 $user="root";
 $password = "123456789";
 $connection  =new PDO("mysql:host=$server;dbname=$dbname",$user,$password);
 
session_start();
if($_SESSION['data']!= null){
   if(isset($_POST['submit']))
{
   

if($_REQUEST['id']!==null)
{
   $query ="update users set name = '$_POST[name]',email='$_POST[email]',password='$_POST[password]',role='$_POST[user]' where id = $_REQUEST[id]";

   $connection->query($query);
   echo "Done Edit";
   header("location:dashboard.php");
   

}
else{






 $query ="INSERT INTO users (name,email,password,role) values ('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[user]')";

 $connection->query($query);
 unset($connection);
 header("location:dashboard.php");


}
unset($connection);
}

}
else
{
   
    
   header("location:index.php");
}



?>
    
</body>
</html>