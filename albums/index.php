<?php

 require ('connect.php');
//require '../users/connect.php';
//$table = 'topic';

//$topic = selectAll($table);

$users = selectAll($table);
$curr_user = $_SESSION['id'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="scripts.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <!--  <link rel="stylesheet" href="admin.css"> -->
<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
    <title></title>
    <style>
    /*DARKMODE*/
    body {
      --accent-color: orangered;
      --background-color: white;
      --text-color: black;
      --button-text-color: var(--background-color);
      --transition-delay: 1s;



      transition: var(--transition-delay);
      background-color: var(--background-color);
      color: var(--text-color);
    }

    body.dark {
      --accent-color: #D0D066;
      --background-color: #333;
      --text-color: white;
    }

    .title {
      margin: 0;
      margin-bottom: .5rem;
    }

    .theme-toggle-button {
      background-color: var(--accent-color);
      color: var(--button-text-color);

      display: flex;
      justify-content: top;
      align-items: left;
      cursor: pointer;

      border-radius: 200px;
      margin-left: 100px;
      border: none;
      outline: none;
      transition: var(--transition-delay);
      transform: scale(1);
    }

    .theme-toggle-button .icon {
      margin-right: .2em;
    }

    .theme-toggle-button:hover,
    .theme-toggle-button:focus {
      transform: scale(1.1);
    }

    .sun-moon-container {
      --rotation: 0;

      position: absolute;
      pointer-events: none;
      display: flex;
      justify-content: center;
      align-items: center;
      top: 0;
      height: 200vmin;
      transform: rotate(calc(var(--rotation) * 1deg));
      transition: transform var(--transition-delay);
    }

    .sun,
    .moon {
      position: absolute;
      transition: opacity, fill, var(--transition-delay);
      width: 30px;
      height: 30px;
      fill: var(--accent-color);
    }

    .sun {
      top: 15%;
      margin-left: 70px;
      opacity: 1;
    }

    .dark .sun {
      opacity: 0;
    }

    .moon {
      bottom: 15%;
      margin-right: 70px;
      opacity: 0;
      transform: rotate(180deg);
    }

    .dark .moon {
      opacity: 1;
    }
    *{
      box-sizing: border-box;
    }
    p{
      font-size: 15px;
      align-items: left;
      margin-right:  0px;

    }
    h4{
      font-size: 20px;
      margin-left: 0px;
      margin-top: 15px;



    }
    img{
      width: 100%;
      height: 150px;
    }
    .page-wrapper{
      min-height: 100%;
    }
    .page-wrapper a:hover{
      color: #006669;
    }
    html, body{
      height: 100%;
      padding: 0px;
      margin: 0px;

      font-family: 'lora','serif';
    }
    h1, h3, h5, h6{
      font-family: 'candal', 'serif';
      color: inherit;
    margin: 5px;

    }
    h2{
      font-size: 20px;
    font-family: 'lora','serif';
    text-align: center;
    align-items: center;
    margin-right: 500px;
    }
    a{
      text-decoration: none;
      color: inherit;

    }
    .text-input{
      padding: .7rem 1rem;
      display: block;
      width: 100%;
      border-radius: 5px;
      outline: none;

      line-height: 1.5rem;
      font-family: 'lora',serif;
      font-size: 1.2em;
    }
    .clearfix::after{
      content: '';
      display: block;
      clear: both;
    }
    header{

      height: 66px;
    }
    header *{

    }
    header .logo{
      float: left;
      height: inherit;
      margin-left: 2em;
    }
    header .logo-text{
      margin: 8px;
      font-family: arial
    }
    header .logo-text span{
      color: lightblue;
    }
    header ul{
      float: right;
      margin: 0px;
      padding: 0px;
      list-style: none;

    }
    header ul li{
      float: left;
      position: relative;
    }
    header ul li ul{
      position: absolute;
      top: 66px;
      right: 0px;
      width:180px;
      display: none;
      z-index: 88888;
    }
    header ul li:hover ul{
      display: block;
    }
    header ul li ul li{
      width: 100%;
    }

    header ul li ul li a{
      padding: 10px;
    }
    header ul li ul li a:hover{
      background: lightblue;
    }
    header ul li a{
      display: block;
      padding: 21px;
      font-size: 1.1em;
      text-decoration: none;
      color: inherit;
    }
    .showing{
      max-height: 100em;
    }
    header ul li a:hover{
      background: grey;
      transition: 0.5s;
    }
    header .menu-toggle{
      display: none;
    }
    header ul li ul li a.logout{
      color: red;
    }
    header ul li ul li a.dash{
      color: green;
    }
    /*POST SLIDERS*/
    .post-slider{

    }
    .post-slider .post-wrapper{
      width: 84%;
      height: 350px;
      margin: 0px auto;
      overflow: hidden;
      padding: 10px 0px 10px 0px;

    }
    .post-slider .next{
      position: absolute;
      top: 50%;
      right:30px;
      color: #006669;
      cursor: pointer;
        font-size: 2em;
    }
    .post-slider .prev{
      position: absolute;
      top: 50%;
      left:30px;
      font-size: 2em;
      color: #006669;
      cursor: pointer;
    }
    .post-slider .post-wrapper .post{

      display: inline-block;
      width: 300px;
      height: 330px;
      margin: 0px 10px;
      border-radius: 5px;

    }
    .post-slider .slider-title{
      text-align: center;
      margin: 30px auto;
    }
    .post-slider .post-wrapper .post .slider-image{
      width: 100%;
      height: 150px;
      position: relative;
      display: block;
      float: left;
      width: 50%;
      border-radius: 10px;
      overflow: hidden;
      box-shadow:  #3d2173a1;
      transition: all ease .5s;
    }
    .post-slider .post-wrapper .post .slider-image:hover{
      box-shadow: none;
      transform: scale(0.98) translateY(5px);
    }
    .post-slider .post-wrapper .post .post-info{
      height: 130px;
      padding: 0px 5px;
      color: inherit;
    }

    /*CONTENT*/
    .content{
      width: 90%;
      margin: 30px auto 30px;


    }
    .content .main-content{
      width: 70%;
      float: left;

    }

    .content .main-content .post{
      width: 100%;
      height: 270px;
      margin: 10px auto;
      border-radius: 5px;
      position: relative;

    }
    .content .main-content .post .read-more {
      position: absolute;
      bottom: 20px;
      right: 20px;
      border: 1px solid #005255;
      background: transparent;

      color: #005255 !important;
    }
    .content .main-content .post .read-more:hover{
      background: #006669;
      color: white !important;
      transition: .25s;
    }
    .content .main-content .post .post-preview {
      width: 60%;
      padding: 10px;
      float: right;

    }
    .content .main-content .post .post-image{
      width: 40%;
      height: 100%;
      float: left;
      border-bottom-left-radius: 5px;
      border-top-left-radius: 5px;

    }
    .text-input{
      padding: .7rem 1rem;
      display: block;
      width: 100%;
      border-radius: 5px;
      outline: none;

      line-height: 1.5rem;
      font-family: 'lora',serif;
      font-size: 1.2em;
    }
    .content .main-content .post .post-image:hover{
      box-shadow: none;
      transform: scale(0.98) translateY(5px);
    }
    .content .main-content .recent-post-title{
      margin: 20px;
    }
    .btn{
      padding: .5rem 1rem;
      background: #006669;
      color: white;
      border: 1px solid transparent;
      border-radius: .25rem;
    }
    .btn:hover{
      color: white !important;
      background: #005255;
    }
    .content .sidebar{
      width: 30%;
      float: left;

    }
    .content .sidebar .section{

      padding: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    .content .sidebar .section.search{
      margin-top: 50px;
    }
    .content .sidebar .section .section-title{
      margin: 10px 0 10px 0px;
    }
    .content .sidebar .section.topics ul{
      margin: 0px;
      padding: 0px;
      list-style: none;
      border-top: 1px solid grey;
    }
    .content .sidebar .section.topics ul li a{
      display: block;
      padding: 15px 0px 15px 0px;
      border-bottom: 1px solid grey;
        transition: all 0.3s;
    }
    .content .sidebar .section.topics ul li a:hover{
      padding-left: 10px;
      transition: all 0.3s;

    }
    /*FOOTER*/
    .footer{
      height: 400px;


      position: relative;
    }
    .footer .footer-bottom{

      color: #686868;
      height: 30px;
      text-align: center;
      position: absolute;
      bottom: 0px;
      left: 0px;
      padding-top: 20px;
      width: 100%;
    }
    .footer .footer-content{

      height: 350px;
      display: flex;
    }
    .footer .footer-content .footer-section{
      flex: 1;
      padding: 25px;
    }
    .footer .footer-content h1 span{
      color: lightblue;
    }
    .footer .footer-content .about .contact span {
      display: block;
      font-size: 1.1em;
      margin-bottom: 8px;
    }
    .footer .footer-content .socials a{

      width: 45px;
      height: 41px;
      padding-top: 5px;
      margin-right: 5px;
      display: inline-block;
      text-align: center;
      font-size: 1.3em;
      border-radius: 5px;
      transition: all .3s;
    }
    .footer .footer-content .socials a:hover{
      border: white;
      color: white;
      transition: all .3s;
    }
    .footer .footer-content .links ul a{
      display: block;
      margin-bottom: 10px;
      font-size: 1.2em;
        transition: all .3s;
        text-align: center;
        align-items: center;
    }
    .footer .footer-content .links ul a:hover{
      margin-left: 15px;
      transition: all .3s;
    }
    /*MEDIA QUERY*/
    @media only screen and (max-width: 934px) {
      .content{
        width: 100%;
      }
      .content .main-content{
        width: 100%;

      }
      .content .sidebar{
        width: 100%;
      }

      .footer{
        height: auto;

        color: #d3d3d3;
        position: relative;

      }
      .footer .footer-content{
        height: auto;
        flex-direction: column;
      }
    }

    @media only screen and (max-width: 750px) {
      header{
        position: relative;
      }

      header ul {
        width: 100%;

        max-height: 0px;
        overflow: hidden;
      }
      header ul li{
        width: 100%;
      }
      header ul li ul{
        position: static;
        width:100%;
        display: block;

        padding-left:50px;
      }
      header .menu-toggle{
        display: block;
        position: absolute;
        right: 20px;
        top:10px;
        font-size:1.9em;

      }
      header .logo{
        margin-left: .8em;
      }
      header .logo-text{
        margin: .9px;
        font-family: arial
      }


      .content .main-content .post .post-image {
        width: 40%;
        float: left;
        border-radius: 10px;
        padding: 10px;
        overflow: hidden;
        transition: all ease .5s;
      }

    }
    @media only screen and (max-width: 600px) {
      .content .main-content .post{
        height: auto;
      }
    .content .main-content .post .post-image{
      width: 100%;
    }
    .content .main-content .post .post-preview{
      width: 100%;
      }
      .content .main-content .post .read-more {
        position: static;
        width: 100%;
        display: block;
      }
    }

    *{

      transition: .3s;
    }
    /*TABLES CSS*/


    header{
    background: #01474a;
      height: 66px;
    }
    header *{

    }
    header .logo{
      float: left;
      height: inherit;
      margin-left: 2em;
    }
    header .logo-text{
      margin: 8px;
      font-family: arial
    }
    header .logo-text span{
      color: lightblue;
    }
    header ul{
      float: right;
      margin: 0px;
      padding: 0px;
      list-style: none;

    }
    header ul li{
      float: left;
      position: relative;
    }
    header ul li ul{
      position: absolute;
      top: 66px;
      right: 0px;
      width:180px;
      display: none;
      z-index: 88888;
    }
    header ul li:hover ul{
      display: block;
    }
    header ul li ul li{
      width: 100%;
    }

    header ul li ul li a{
      padding: 10px;
    }
    header ul li ul li a:hover{
      background: lightblue;
    }
    header ul li a{
      display: block;
      padding: 21px;
      font-size: 1.1em;
      text-decoration: none;
      color: inherit;
    }
    .showing{
      max-height: 100em;
    }
    header ul li a:hover{
      background: grey;
      transition: 0.5s;
    }
    header .menu-toggle{
      display: none;
    }
    header ul li ul li a.logout{
      color: red;
    }
    header ul li ul li a.dash{
      color: green;
    }
    .admin-wrapper{

      display: flex;
      height: calc(100% - 66px);
    }
    .admin-wrapper .left-sidebar{
      flex: 2;
      height: 100%;
      background: #234a57;
    }
    .admin-wrapper .admin-content{
      flex: 8;
      height: 100%;
      padding: 40px 100px 100px;
      overflow-y: scroll;
    }
    .admin-wrapper .left-sidebar ul{
      list-style: none;
      margin: 0px;
      padding: 0px;

    }
    .admin-wrapper .left-sidebar ul li a{
      padding: 18px;
      display: block;
      color: inherit;
    }
    .admin-wrapper .left-sidebar ul li a:hover{
      background: #004044;
    }
    .admin-content .page-title{
      text-align: center;
      margin-bottom: 1.5rem;


    }
    table{
      width: 100%;
      border-collapse: collapse;
      font-size: 1.1rem;
    }
    th, td{
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid lightgrey;
    }
    .edit{
      color: green;
    }
    .delete{
      color: red;
    }
    .publish{
      color: blue;
    }
    .edit:hover, .delete:hover, .publish:hover{
      text-decoration: underline;
    }
    .text-input{
      padding: .7rem 1rem;
      display: block;
      width: 100%;
      border-radius: 5px;
      outline: none;

      line-height: 1.5rem;
      font-family: 'lora',serif;
      font-size: 1.2em;
    }
    .btn{
      padding: .5rem 1rem;
      background: #006669;
      color: white;
      border: 1px solid transparent;
      border-radius: .25rem;
    }
    form div{
      margin-bottom: 15px;
    }

    </style>
  </head>
  <body>
    <header>
      <div class="logo">
        <h1 class="logo-text"><span>Emotions</span>.Com </h1>
      </div>

      <i class="fa fa-bars menu-toggle"></i>
      <ul class="nav">




      <!--  <li><a href="#"></a> </li>
        <li><a href="#"></a> </li>
        <li><a href="#">
            <i class="fa fa-user"></i>
    <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
              <ul>
                    <li><a href="../dashboard.php" class="dash" >Dashboard</a> </li>
                <li><a href="../users/logout.php" class="logout" >Logout</a> </li>
              </ul>
        </li>
      </ul>-->
    </header><br><br>
    <ul>
      <!--DARK/LIGHT MODE-->
    <button class="theme-toggle-button">
      <svg class="icon" style="width:20px;height:20px" viewBox="0 0 24 24">
        <path fill="currentColor" d="M7.5,2C5.71,3.15 4.5,5.18 4.5,7.5C4.5,9.82 5.71,11.85 7.53,13C4.46,13 2,10.54 2,7.5A5.5,5.5 0 0,1 7.5,2M19.07,3.5L20.5,4.93L4.93,20.5L3.5,19.07L19.07,3.5M12.89,5.93L11.41,5L9.97,6L10.39,4.3L9,3.24L10.75,3.12L11.33,1.47L12,3.1L13.73,3.13L12.38,4.26L12.89,5.93M9.59,9.54L8.43,8.81L7.31,9.59L7.65,8.27L6.56,7.44L7.92,7.35L8.37,6.06L8.88,7.33L10.24,7.36L9.19,8.23L9.59,9.54M19,13.5A5.5,5.5 0 0,1 13.5,19C12.28,19 11.15,18.6 10.24,17.93L17.93,10.24C18.6,11.15 19,12.28 19,13.5M14.6,20.08L17.37,18.93L17.13,22.28L14.6,20.08M18.93,17.38L20.08,14.61L22.28,17.15L18.93,17.38M20.08,12.42L18.94,9.64L22.28,9.88L20.08,12.42M9.63,18.93L12.4,20.08L9.87,22.27L9.63,18.93Z" />
      </svg>

    </button>
    <div class="sun-moon-container">
      <svg class="sun" style="width:24px;height:24px" viewBox="0 0 24 24">
        <path d="M3.55,18.54L4.96,19.95L6.76,18.16L5.34,16.74M11,22.45C11.32,22.45 13,22.45 13,22.45V19.5H11M12,5.5A6,6 0 0,0 6,11.5A6,6 0 0,0 12,17.5A6,6 0 0,0 18,11.5C18,8.18 15.31,5.5 12,5.5M20,12.5H23V10.5H20M17.24,18.16L19.04,19.95L20.45,18.54L18.66,16.74M20.45,4.46L19.04,3.05L17.24,4.84L18.66,6.26M13,0.55H11V3.5H13M4,10.5H1V12.5H4M6.76,4.84L4.96,3.05L3.55,4.46L5.34,6.26L6.76,4.84Z" />
      </svg>

      <svg class="moon" style="width:24px;height:24px" viewBox="0 0 24 24">
        <path d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
      </svg>
    </div>
<br><br>


    <!--CONTENT-->
    <div class="admin-content">
        <div class="button-group">

            <a href="../../dashboard.php" class="btn btn-big">Dashboard</a>
        <!--  <a href="folder.php" class="btn btn-big">Upload Folder</a>
          <a href="home.php" class="btn btn-big">Upload Beats</a>-->
          <a href="create-post.php" class="btn btn-big">Upload Songs</a>
        </div>
    <div class="content clearfix">

      <!--MAIN CONTENT-->
      <div class="main-content">

        <div class="content">
          <h2 class="page-title">Manage  your Posts <br>  <?php echo $_SESSION['username'];  ?></h2>

            <?php include 'flash-messages.php'; ?>
          <table>
            <thead>
              <th>SN</th>
                <th>Title</th>
                 
                  <!--<th>Author</th> -->
                    <th colspan="3" >Action</th>
            </thead>
            <tbody>

        <?php
        $posts1 = selectAll($table,['user_id'=>$curr_user]);
        foreach ($posts1 as $key => $post):

        endforeach;
         foreach ($posts1 as $key => $post): ?>

                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $post['title'] ?></td>
                    
                  <!--<td><?php echo $_SESSION['username']; ?></td>-->
     
                      <td> <a href="al.php?id=<?php echo $post['id']; ?>" class="edit" >Add Songs</a></td>
                      <td> <a href="edit.php?id=<?php echo $post['id']; ?>" class="edit" >edit</a></td>
                      <td> <a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete" >delete</a></td>


                <?php if ($post['published']): ?>
                  <td> <a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish" >unpublish</a> </td>
                <?php else: ?>
                  <td> <a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish" >publish</a> </td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>
        </div>
<!--END-->

      <!--SIDEBAR-->
      <div class="sidebar">

        <div   class="section search">


</div>
    <!--FOOTER-->
    <div class="footer">
      <div class="footer-content">
          <div class="footer-section about">

      <div class="footer-bottom">
      &copy; Emotions.com
    </div>
    </div>
    <!--QUERy-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--AUTO PLAY-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--EDITOR-->
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
  <!--CUSTom jS-->
  <script src="script.js"></script>
  </body>
</html>
