<?php
//session_start();
require_once('../private/initialize.php');
?>

<?php
  if (is_request_post()) {
    if(isset($_POST['login'])) {
      $username = $_POST['email'];
      $password = $_POST['password'];

      $result = get_user_for_login($db, $username, $password);
      if (!$result) {
        redirect_to(url_for('login.php'));
      }
      
      //$lifetime=43200;
      //ini_set('session.gc_maxlifetime', $lifetime);
      session_start();
      $user = mysqli_fetch_assoc($result);
      //setcookie(session_name(),session_id(),time()+$lifetime);
      $_SESSION['email'] = $user['email'];
      $_SESSION['user_type'] = $user['user_type'] == 1 ? "admin" : "normal" ;
      $_SESSION['name'] = $user['first_name'];
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_level'] = $user['user_level'];
      $_SESSION['add_level'] = $user['add_level'];
      $_SESSION['sub_level'] = $user['sub_level'];
      $_SESSION['div_level'] = $user['div_level'];
      $_SESSION['mult_level'] = $user['mult_level'];

      
      session_write_close();
      //print_r($_SESSION);

      redirect_to(url_for("index.php"));
    }
    else if (isset($_POST['signup'])) {
      echo "Signing up!!";
    }
  } 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

  
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo url_for('css/bootstrap.min.css');?>">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo url_for('css/signin.css');?>">
  
</head>
<body class="text-center">
  <div class="container" id="loginForm">
  <form class="form-signin" action="login.php" method="POST">
    <img class="mb-4" src="<?php echo url_for('img/bootstrap-solid.svg');?>" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="btn btn-lg btn-primary" type="submit" name="login">Log In</button>
    <button class="btn btn-lg btn-primary" type="button" id="register">Sign Up</button>
    <!--<div class="form-text">
      Don't have an account? <a href="" type="button" id="register">Sign Up</a>
    </div>-->`
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
  </div>


  <div class="container" id=regForm>
  <form class="form-signin" action="<?php echo url_for("/register.php")?>" method="POST">
    <img class="mb-4" src="<?php echo url_for('img/bootstrap-solid.svg');?>" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please Fill The Form to Register</h1>
    
    <div class="row mb-3">
      <label for="regFName" class="sr-">First Name</label>
      <input type="text" id="regFName" name="regFName" class="form-control" placeholder="Enter First Name" required>
    </div>

    <div class="row mb-3">
      <label for="regLName">Last Name</label>
      <input type="text" name="regLName" id="regLName" class="form-control" placeholder="Enter last name" required>
    </div>
    
    <div class="row mb-3">
      <label for="regUserEmail" class="sr-">Email</label>
      <input type="email" id="regUserEmail" name="regUserEmail" class="form-control" required>
    </div>
    
    <div class="row mb-3">
      <label for="regUserPass" class="sr-">Password</label>
      <input type="password" id="regUserPass" class="form-control" name="regUserPass" required>
    </div>
    
    
    <input type="hidden" name="regUserType" value="2">
    <input type="hidden" name="regUserLevel" value="1">
    <div class="checkbox mb-3">
      
    </div> 
    <!-- <button class="btn btn-lg btn-primary" type="button" id="login">Log In</button> -->
    <button class="btn btn-lg btn-primary" type="submit" name="signup">Sign Up</button>
    <div class="form-text">
      Already have an account?<a href="" id="login"> Log in</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
  </div>

  <script>
    
    const signUpForm = document.querySelector('#regForm');
    const logInForm = document.querySelector('#loginForm');
    
    signUpForm.style.display = 'none';

    const logInBtn = document.querySelector('#login');
    const signUpBtn = document.querySelector('#register');
 
    logInBtn.addEventListener('click', ()=> {
      signUpForm.style.display = 'none';
      logInForm.style.display = 'block';
    });

    
    signUpBtn.addEventListener('click', ()=> {
      signUpForm.style.display = 'block';
      logInForm.style.display = 'none';
    });

        
  </script>
</body>
</html>
