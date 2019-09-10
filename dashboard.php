<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="register.php">+</a>
<form>
<button name = "logout" value="done" type="submit">Logout</button>
</form>
<?php
 $server = "localhost";
 $dbname="university";
 $user="root";
 $password = "123456789";
 $connection  =new PDO("mysql:host=$server;dbname=$dbname",$user,$password);



echo "Dashboard";
echo "<br/>";
if($_REQUEST['id']!==null)
{

    $query = "DELETE FROM users WHERE id = '$_REQUEST[id]'";
    $connection->query($query);
    


echo "Request";
    
}
session_start();

if($_SESSION['data']!= null)
{

 echo("Hello ".$_SESSION['data']['name']);



 
 $query ="SELECT * FROM users where role = 'u'";

 $results  = $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);

 echo "<table>";
 echo "<tr><td>ID</td>
 <td>Name</td>
 <td>Email</td>
 <td>Password</td>
 <td>Role</td>
 <td>Action</td>
 </tr>";
 foreach($results as $result)
 {
     echo "<tr>";
    foreach($result as $value)
    {
        echo "<td> $value </td>";
        
    }
    echo "<td><a href=register.php?id=$result[id]>EDIT</> || <a href = dashboard.php?id=$result[id]>REMOVE</a></td>";
    echo "</tr>";

 }
 echo "</table>";

}
else
{
    header("location:index.php");
}





if(isset($_GET['logout']))
{
    unset($_SESSION['data']);
    header("location:index.php");
}


unset($connection);

?>
    
</body>
</html>