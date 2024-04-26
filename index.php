<?php session_start(); ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginpage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   
</head>
<body>
    <h1 id="welcome">Welcome to Gumii's website </h1>
    <div class="bd">
   <div class="container">
    <h2>LOGIN </h2>
    <form  method="post"  class="l-form">
       <img src="images/P4.png" alt="" class="icon">
       <img src="images/10337574.png" alt="" class="icon2">
       <div class="c-input">
       <input type="text" name="username" placeholder="Username" required >
       <input type="password" name="password" id="password" placeholder="Password" required>
    </div>
       <i class="fa-solid fa-eye" id="show-password" class="o"></i>
       <button type="submit" name="login">Log In</button>
      
    </form>
    <p>Don't have an account? <a href="signup.html">Sign up</a></p>
    <?php
    include('db.php');
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $query=mysqli_query($conn,"SELECT * FROM `users` WHERE username='$username' and password='$password' ");
        $row=mysqli_num_rows($query);
        if($row==1){
            $_SESSION['admin']='admin';
            echo "
            <script>
                alert('logged in');
                window.location='page.php';
            </script>
            ";
        }
        else{
            echo "
            <script>
                alert('error');
                window.location='index.php';
            </script>
            ";
        }
    }
    ?>
   </div>
</div>
<script>
    const showPassword = document.querySelector("#show-password");
    const passwordField = document.querySelector("#password");

    showPassword.addEventListener("click", function() {
        this.classList.toggle("fa-eye-slash");
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
    });
   
</script>
</body> 
</html>