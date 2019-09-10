<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login Page</h1>

    <form method="post">
    <input type="text" name = "email"/>
    <input type="password" name = "password"/>
    <input type="submit" name= "submit" value="click"/>
    
    
    </form>
<?php
$server ="localhost";
$dbname = "university";
$user = "root";
$password = "123456789";
$error = '';


if(isset($_POST["submit"])){
try
{
    $check ="Please Check on Your Email And Password";
   
    $connection = new PDO("mysql:host=$server;dbname=$dbname",$user,$password);
    $query ="SELECT * FROM users where email = '$_POST[email]' and password='$_POST[password]'";
    $result  = $connection->query($query)->fetch(PDO::FETCH_ASSOC);

    if($result !=null)
    {
        unset($check);
        session_start();
        $_SESSION['test'] = 'Hello';
        if($result['role'] === 'm')
        {
            $_SESSION['data'] = $result;
            header("location: dashboard.php");
    
    
        }
        else
        {
            $_SESSION['data'] = $result;
              header("location:index.php");
        }
}
        else
        {
            echo $check;
        }
 


}
    catch(PPDOException $e)
    {
        echo "ERROR";

    }

}

 ?>    
</body>
</html>
