<?php require "includes/header.php";?>
<?php require "config/config.php";?>

 <?php
 $res =$conn->query("SELECT COUNT(*) FROM voters");

 $users = $res->fetchColumn()-1;

 ?>


  <body class="admin-body">
  <?php if($_SESSION['username']=='Kelly'): ?>
    <div>
      <h1 class="intro-text white">Welcome Admin <?php echo $_SESSION['username']; ?>,</h1>
      <section>
      <p class="white">What would you like to do today?</p>
      
      </section>
      <section>
        <div class="flex-admin">
          <div class="admin-card">
            
            <div class="admin-box">
              <div class="card-icon-i">
              <i class="fa-solid fa-users fa-2x"></i>
              </div>
              <?php if($users > 1) : ?>
              <h4><?php echo $users; ?> Users</h4>
              <?php elseif($users===0) : ?>
                <h4> No Users</h4> 
              <?php else : ?>
                <h4><?php echo $users; ?> User</h4>
                <?php endif ?>
            </div>
            <p>See all voters currently registered</p>
            <div class="line"></div>
            <a class="admin-link" href='http://localhost/online-voting/users.php'>View all Users
            </a>
            
          </div>
          <div class="admin-card">
            
            <div class="admin-box">
              <div class="card-icon-i">
              <i class="fa-solid fa-people-group fa-2x"></i>
              </div>
              <h4>Candidates</h4>
            </div>
            <p>See all candidates</p>
            <div class="line"></div>
            <a class="admin-link" href='http://localhost/online-voting/candidates.php'>View all Candidates
            </a>
            
          </div>
          <div class="admin-card">
            
            <div class="admin-box">
              <div class="card-icon-i">
              <i class="fa-solid fa-person-booth fa-2x"></i>
              </div>
              <h4>Votes</h4>
            </div>
            <p>See current votes</p>
            <div class="line"></div>
            <a class="admin-link" href='http://localhost/online-voting/allVotes.php'>View all Votes
            </a>
            
          </div>
          <div class="admin-card">
            
            <div class="admin-box">
              <div class="card-icon-i">
              <i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i>
              </div>
              <h4>Log Out</h4>
            </div>
            <p>End Session</p>
            <div class="line"></div>
            <a class="admin-link" href='http://localhost/online-voting/auth/logout.php'>Log Out
            </a>
            
          </div>
          
        </div>
      </section>
     
    </div>
    <?php else : ?>
      <div>
        <p>You are not an admin</p>
      </div>
      <?php endif ?>
  </body>
</html>
