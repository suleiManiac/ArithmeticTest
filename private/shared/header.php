<?php 

if (empty($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['user_id'])) {
    redirect_to(url_for('/login.php'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Math Help: <?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo url_for('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('css/dashboard.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('css/style.css');?>">
</head>
<body>
    
