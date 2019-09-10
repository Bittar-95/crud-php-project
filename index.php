<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo "Home";
session_start();

if($_SESSION['data']!= null)
{
    print_r($_SESSION['data']);

}


?>
    
</body>
</html>