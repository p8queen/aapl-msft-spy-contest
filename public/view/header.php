<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-1">
        <div class="row justify-content-center">
            <div class="col-md-12">    
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">AAPL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./spy">SPY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./msft">MSFT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./contest" tabindex="-1">Contest</a>
        </li>
      </ul>
      <div class="ms-auto">
        <?php
        if(!isset($_SESSION['authentication']))
        {
            ?>
            <a href="./login" class="btn btn-primary mt-1 me-2">Login</a>
            <?php
        }else{
            ?>
            <a href="./logout" class="btn btn-danger mt-1 me-2">Logout</a>
            <?php
        }
        ?>
        </div>
        

    </div>
  </div>
</nav>