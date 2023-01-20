<?php require "includes/header.php";?>
<?php require "config/config.php";?>

<?php
// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


// Check if user has already voted
$username = $_SESSION['username'];
$check_stmt = $conn->prepare("SELECT * FROM votes WHERE username = :username");
$check_stmt->execute(['username' => $username]);

if($check_stmt->rowCount() > 0) {
    echo "You have already voted.";
    exit();
}

// Handle candidate selection
if(isset($_POST['candidate']) && isset($_POST['category'])) {
    $candidate = $_POST['candidate'];
    $category = $_POST['category'];
    $vote_stmt = $pdo->prepare("INSERT INTO votes (username, candidate, category) VALUES (:username, :candidate, :category)");
    $vote_stmt->execute(['username' => $username, 'candidate' => $candidate, 'category' => $category]);
    echo "Your vote for $candidate in the $category category has been recorded.";
    exit();
}

?>

<body class="container">
    <h1 class="intro-text">Welcome <?php echo $_SESSION['username']; ?>,</h1>
    <p>You can only choose one candidate in each category</p>
    <div>
        <h2 class="cat-center">Categories</h2>
    <section>
        <h1>President</h1>
        <div>
            <form action="vote.php" method="POST" class="card-container">
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Cyrus Lee</h3>
                    <p>Bcom</p>
                    <button class="card-btn" name="candidate" value="Cyrus Lee" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="President">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Laura Amunga</h3>
                    <p>BIT</p>
                    <button class="card-btn" name="candidate" value="Laura Amunga" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="President">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>James Charles</h3>
                    <p>BBIT</p>
                    <button class="card-btn" name="candidate" value="James Charles" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="President">
                </div>
            </div>
           
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Kate Jenner</h3>
                    <p>Health</p>
                    <button class="card-btn" name="candidate" value="Kate Jenner" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="President">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Bruce Mckain</h3>
                    <p>Pharmacy</p>
                    <button class="card-btn" name="candidate" value="Bruce Mckain" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="President">
                </div>
            </div>
            </form>
        </div>
    </section>
    <section>
        <h1>Academic Affairs</h1>
        <div>
            <form action="vote.php" method="POST" class="card-container">
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Sheila Wabukati</h3>
                    <p>Bcom</p>
                    <button class="card-btn" name="candidate" value="Sheila Wabukati" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Academic Affairs">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Rubenson Kagame</h3>
                    <p>BIT</p>
                    <button class="card-btn" name="candidate" value="Rubenson Kagame" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Academic Affairs">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Peter Wafula</h3>
                    <p>BBIT</p>
                    <button class="card-btn" name="candidate" value="Peter Wafula" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Academic Affairs">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Faith Lois</h3>
                    <p>Health</p>
                    <button class="card-btn" name="candidate" value="Faith Lois" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Academic Affairs">
                </div>
            </div>
            <div class="card">
                <div class="card-img"></div>
                <div class="card-text">
                    <h3>Hope Lornah</h3>
                    <p>Pharmacy</p>
                    <button class="card-btn" name="candidate" value="Hope Lornah" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Academic Affairs">
                </div>
            </div>
            </form>
        </div>
    </section>
    <section>
        <h1>Sports & Entertainment</h1>
        <div>
        <form action="vote.php" method="POST" class="card-container">
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Paula Clarette</h3>
                <p>Bcom</p>
                <button class="card-btn" name="candidate" value="Paula Clarette" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Sports & Entertainment">
            </div>
            </div>
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Jane Doe</h3>
                <p>BIT</p>
                <button class="card-btn" name="candidate" value="Jane Doe" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Sports & Entertainment">
            </div>
            </div>
            
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Jimmy Gathu</h3>
                <p>BBIT</p>
                <button class="card-btn" name="candidate" value="Jimmy Gathu" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Sports & Entertainment">
            </div>
            </div>
            
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Ema Paulson</h3>
                <p>Health</p>
                <button class="card-btn" name="candidate" value="Ema Paulson" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Sports & Entertainment">
            </div>
            </div>
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Jean Joyce</h3>
                <p>Pharmacy</p>
                <button class="card-btn" name="candidate" value="Jean Joyce" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Sports & Entertainment">
            </div>
            </div>
        </form>
        </div>
    </section>
    <section>
        <h1>Finance</h1>
        <div>
        <form action="vote.php" method="POST" class="card-container">
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Eva Achieng</h3>
                <p>Bcom</p>
                <button class="card-btn" name="candidate" value="Eva Achieng" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Finance">
            </div>
            </div>
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Sean Michaels</h3>
                <p>BIT</p>
                <button class="card-btn" name="candidate" value="Sean Michaels" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Finance">
            </div>
            </div>
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Peter Kane</h3>
                <p>BBIT</p>
                <button class="card-btn" name="candidate" value="Peter Kane" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Finance">
            </div>
            </div>
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>Jim Beglin</h3>
                <p>Health</p>
                <button class="card-btn" name="candidate" value="Jim Beglin" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Finance">
            </div>
            </div>
            <div class="card">
            <div class="card-img">

            </div>
            <div class="card-text">
                <h3>John Doe</h3>
                <p>Pharmacy</p>
                <button class="card-btn" name="candidate" value="John Doe" onclick="disableButtons(this)">Select</button>
                    <input type="hidden" name="category" value="Finance">
            </div>
            </div>
        </form>
        </div>
    </section>
    </div>
    <script type="text/javascript">
        
        function disableButtons(clickedButton) {
            // Get the form containing the clicked button
            var form = clickedButton.form;
            // Get all buttons in the form
            var buttons = form.getElementsByTagName("button");
            // Disable all buttons
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].disabled = true;
            }
        }
    </script>
</body>