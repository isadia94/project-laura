<?php require "includes/header.php";?>

  <body class="login">
    
    <div class="form_section_left">

        <h1 class="welcome">JKUAT Student Voting System</h1>
        <p class="splash">To register as a new voter kindly</p>

      
        <button class="buttonRegister" onclick="navLogin()">
          Sign Up
        </button>

        <p class="splash">Or</p>

        <p class="splash">Log In if you are already registered</p>
        <button class="buttonLogin" onclick="navLogin()">
          Log In
        </button>
      
    </div>
    <div class="form_section_intro">
    <video preload="auto" loop autoplay muted>
                    <source src='assets/videos/typing.mp4' type='video/mp4' />
                    
                </video>
    </div>
  </body>
  <script type="text/javascript">
    function navLogin(){
   
        window.location.href="<?php echo APPURL; ?>/login.php";
      
    }
    function navRegister(){
   
        window.location.href="<?php echo APPURL; ?>/register.php";
      
    }
  </script>
</html>
