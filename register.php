
<?php require "includes/header.php";?>




  <body class="login">
    <div class="form_section_left">
      <form action="<?php echo APPURL;?>/auth/register.php" method="POST">
        <h1 class="welcome">Register</h1>
        <p class="header_text">
          The faster you fill up, the faster you get voting
        </p>
        <div class="align_twins">
          <div class="form_group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="" class="form_input" />
          </div>
          <div class="form_group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="" class="form_input" />
          </div>
        </div>

        <div class="align_twins">
          <div class="form_group">
            <label for="studentId">Student ID</label>
            <input type="text" name="studentId" id="" class="form_input" />
          </div>
          <div class="form_group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="" class="form_input" />
          </div>
        </div>

        <div class="align_twins">
          <div class="form_group">
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              id=""
              autocomplete="false"
              class="form_input"
            />
          </div>
          <div class="form_group">
            <label for="password">Confirm Password</label>
            <input
              type="password"
              name="confirm_password"
              id=""
              class="form_input"
            />
          </div>
        </div>
        <button type="submit" name="submit">Sign Up</button>
      </form>
      <div class="login_prompt">
        <p class="bottom">Already have an account?</p>
        <span>
          <a href="login.php">Log in</a>
        </span>
      </div>
    </div>
    <div class="form_section_right"></div>
  </body>
</html>
