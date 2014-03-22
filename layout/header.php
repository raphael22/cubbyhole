<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CubbyHole</title>
    <meta charset='utf-8'>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link href='css/normalize.css' rel='stylesheet' type='text/css'>
    <link href='css/style.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <header>
      <div class='btn cursor-on mw640' id='nav-menu'></div>
      <ul id='menu'>
        <li class='btn btn-nav' data-uri="Home"></li>
        <li class='btn btn-nav' data-uri="Profil"></li>
        <li class='btn btn-nav' data-uri="Plans"></li>
      </ul>
      <div id="header-logo-container" class="btn-nav cursor-on" data-uri="Home">
          <span>C</span>
          <span>U</span>
          <span>B</span>
          <span>B</span>
          <span>Y</span>
          <span>H</span>
          <span>O</span>
          <span>L</span>
          <span>E</span>
      </div>
      <?php 
        if(isset($_SESSION["userEmail"])) {
      ?>
        <div data-uri='Disconnect' id='nav-exit' class="btn btn-nav"></div>
        <div data-uri="Profil" id='nav-user-info' class="btn btn-nav">
          <div>
            <span id="nav-user-name">Nikopol</span>
          </div>
          <div >
            <span id="nav-user-stockage">100Gb</span>
          </div>
        </div>  
      <?php 
        }
      ?>
    </header>
    
   <!--  <div class="popup"></div>  -->
    <div id="main-section">