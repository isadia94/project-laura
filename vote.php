<?php require "includes/header.php";?>
<?php require "config/config.php";?>

<?php
// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


// Check if user has already voted
$voters_id = $_SESSION['username'];
$check_stmt = $conn->prepare("SELECT * FROM votes WHERE voters_id = :voters_id");
$check_stmt->execute(['voters_id' => $voters_id]);

if($check_stmt->rowCount() > 0) {
    echo "You have already voted.";
    exit();
}

else{
      // The user has not voted yet
    // Get the list of categories
    $stmt = $conn->prepare('SELECT * FROM categories');
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// // Handle candidate selection
// if(isset($_POST['candidate']) && isset($_POST['category'])) {
//     $candidate = $_POST['candidate'];
//     $category = $_POST['category'];
//     $vote_stmt = $conn->prepare("INSERT INTO votes (username, candidate, category) VALUES (:username, :candidate, :category)");
//     $vote_stmt->execute(['username' => $username, 'candidate' => $candidate, 'category' => $category]);
//     echo "<script>alert('Your vote for $candidate in the $category category has been recorded.')</script>";
//     exit();
// }

?>

<body class="container">
    <h1 class="intro-text">Welcome <?php echo $_SESSION['username']; ?>,</h1>
    <p>You can only choose one candidate in each category</p>
    <div>
        <h2 class="cat-center">Categories</h2>
    <section>
        <?php

        foreach ($categories as $category) {
            echo '<h1>' . $category['name'] . '</h1>';
         
            $stmt = $conn->prepare('SELECT * FROM candidates WHERE category_id = :category_id');
            $stmt->execute([':category_id' => $category['id']]);
            $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
     
            ?>
    
            <div>
            <form action="vote.php" method="post" class="card-container">
                <?php
            foreach ($candidates as $candidate) {
                ?>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3><?php echo $candidate['name']?></h3>
                    <p><?php echo $candidate['course']?></p>
                    <button class="card-btn" name="candidate" value="Cyrus Lee" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="President">
                </div>
            </div>
            <?php }
            ?>
        </form>
            </div>

            <?php }
            ?>

        

        
        
    
        
      
    </section>
    
            
    </div>
    <script type="text/javascript">

        function disableButtons(clickedButton) {
            
            // Get the form containing the clicked button
            var form = clickedButton.form;
            // Get all buttons in the form
            var buttons = form.getElementsByTagName("button");

             // Get the candidate and category values from the form
            var candidate = clickedButton.value;
            var category = form[1].value;
            console.log(form[1]);
            // Disable all buttons
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.add("gray");
                buttons[i].disabled = true;
            }
            alert('Your vote for $candidate in the $category category has been recorded.');
            // Send a POST request to the server with the candidate and category data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "vote.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            }
            xhr.send("candidate=" + candidate + "&category=" + category);
        }
    </script>
</body>