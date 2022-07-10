<?php require_once 'database/authcontroller.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery.passwordstrength.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       *{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
	background: radial-gradient(#ffffff , grey);
}

.wave{
	position: fixed;
	bottom: 0;
	left: 0;
	height: 100%;
	z-index: -1;
}

.container{
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap :7rem;
    padding: 0 2rem;
}

.img{
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

.login-content{
	display: flex;
	justify-content: flex-start;
	align-items: center;
	text-align: center;
}

.img img{
	width: 500px;
}

form{
	width: 360px;
}

.login-content img{
    height: 100px;
}

.login-content h2{
	margin: 15px 0;
	color: #333;
	text-transform: uppercase;
	font-size: 2.9rem;
}

.login-content .input-div{
	position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    padding: 5px 0;
    border-bottom: 2px solid #d9d9d9;
}

.login-content .input-div.one{
	margin-top: 0;
}

.i{
	color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	transition: .3s;
}

.input-div > div{
    position: relative;
	height: 45px;
}

.input-div > div > h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px;
	transition: .3s;
}

.input-div:before, .input-div:after{
	content: '';
	position: absolute;
	bottom: -2px;
	width: 0%;
	height: 2px;
	background-color: #38d39f;
	transition: .4s;
}

.input-div:before{
	right: 50%;
}

.input-div:after{
	left: 50%;
}

.input-div.focus:before, .input-div.focus:after{
	width: 50%;
}

.input-div.focus > div > h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus > .i > i{
	color: #38d39f;
}

.input-div > div > input{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	color: #555;
	font-family: 'poppins', sans-serif;
}

.input-div.pass{
	margin-bottom: 4px;
}

a{
	display: block;
	text-align: right;
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}

a:hover{
	color: #38d39f;
}

.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: .5s;
}
.btn:hover{
	background-position: right;
}


@media screen and (max-width: 1050px){
	.container{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	.login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
	}

	.img img{
		width: 400px;
	}
}

@media screen and (max-width: 900px){
	.container{
		grid-template-columns: 1fr;
	}

	.img{
		display: none;
	}

	.wave{
		display: none;
	}

	.login-content{
		justify-content: center;
	}
}
@media only screen and (max-width: 800px){
    nav ul{
        position: absolute;
        top: 70px;
        left: 0;
        background: #333333;
        opacity: 0.8;
        width: 100%;
        overflow: hidden;
        transition: max-height 0.6s;
    }

    nav ul li{
        display: block;
        margin-bottom: 10px;
        margin-right: 50px;
        margin-top: 10px;
    }
    nav ul li a{
        color: whitesmoke;
    }

    .menu-icon{
        display: block;
        cursor: pointer;
    }

}
.menu-icon{
    width: 28px;
    margin-left: 20px;
    display: none;
}
.navbar{
    display: flex;
    align-items: center;
    padding: 20px;
}

nav{
    flex: 1;
    text-align: right;
}

nav ul{
    display: inline-block;
    list-style: none;
}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}
.password-strength-indicator{
          font-size: 12px;
          text-align: center;
          display: inline-block;
          min-width: 20%;
          transition: 1s;
          height: 16px;
          color: white;
        }
        .password-strength-indicator.very-weak{
          background: red;
          width: 20%;
        }
        .password-strength-indicator.weak{
          background: #f6891f;
          width: 40%;
        }
        .password-strength-indicator.mediocre{
          background: #eeee00;
          width: 60%;
        }
        .password-strength-indicator.strong{
          background: #99ff33;
          width: 80%;
        }
        .password-strength-indicator.very-strong{
          background: #22cf00;
          width: 100%;
        }
        .eye{
             position: absolute;
             color: black;
           }
           #hide1{
             display: none;
           }
        </style>
</head>
<body>

<a style="text-align:center;" href="signup.php">Register</a>
	<img class="wave" src="images/delv.png">
	<div class="container">
		<div class="img">
		
		</div>
        
		<div class="login-content">
            
			<form action="login.php" method="post">
				<img src="images/avatar.svg">
				<h4 class="title"><?php
$t = date("H");

if ($t < "10") {
  echo "Good Morning!";
} elseif ($t < "19") {
  echo "Good Afternoon!";
} else {
  echo "Good Evening!";
}
?><?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
     <?php foreach($errors as $error): ?>
     <li><?php echo $error; ?></li>
   <?php endforeach; ?>
   </div>
 <?php endif; ?>


                </h4>
                
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
                      
           		   		<h5>Username/Email</h5>
           		   		<input type="text" name="username" value="<?php echo $username; ?>" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" id="myInput" name="password"  class="input">
                     <span class="eye" onclick=" myFunction()">
                <i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                <i id="hide2"class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>
            	   </div>
                   
            	</div> 
                
            	<a href="database/reset.php">Forgot Password?</a>
     
            	<input type="submit" name="login-btn" class="btn" value="Login"><br><br>


            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
  function myFunction() {
    var x = document.getElementById("myInput");
      var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type ==='password'){
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
        }
      else{  x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
  }

</script>
<script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>
