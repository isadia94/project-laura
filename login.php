<?php require "includes/header.php";?>

  <body class="login">
    <div class="form_section_right2"></div>
    <div class="form_section_left">
      <form action="<?php echo APPURL;?>/auth/login.php" method="POST">
        <h1 class="welcome">Welcome back</h1>
        <p class="header_text">Enter your Student ID and Password</p>

        <div class="form_group">
          <label for="email">Student ID</label>
          <input
            type="text"
            name="studentId"
            id=""
            class="form_input register"
          />
        </div>

        <div class="form_group">
          <label for="email">Password</label>
          <input
            type="password"
            name="password"
            id=""
            autocomplete="false"
            class="form_input register"
          />
        </div>
        <button type="submit" name="submit">Sign In</button>
      </form>
      <div class="login_prompt">
        <p class="bottom">Not Registered?</p>
        <span>
          <a href="register.php">Register</a>
        </span>
      </div>
    </div>
  </body>
</html>
