<?php
session_start();
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
    href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">


<!-- Custom styles for this template -->
<link href="jumbotron.css" rel="stylesheet">

<script
    src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        ';
        if(empty($_SESSION['username']))
        {
            echo '
            <div class="navbar-collapse collapse">
                <form class="navbar-form navbar-right" role="form" method="POST" action="checklogin.php">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">    
                        <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-success" name="Submit">Sign in</button>
                </form>
            </div><!--/.navbar-collapse -->
            ';
        }
        else
        {
            echo '
            <form class="navbar-form navbar-right" role="form"
                    action="logout.php">
                    <div class="from-group">
                        <label style="color: #999999">'.$_SESSION['username'].'</label> 
                        <button type="submit" class="btn btn-danger">Log ud</button>
                        <a href="changepassword.php"><button type="button" class="btn btn-info">Skift password</button></a>
                    </div>
                </form>
                ';
        }
        echo '
    </div>
</div>
';

?>