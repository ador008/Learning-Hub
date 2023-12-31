<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to signin page
if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit();
}

// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "hub";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's information from the database
$userID = $_SESSION["user_id"];
$sql = "SELECT * FROM user WHERE id = '$userID'";
$result = $conn->query($sql);
$userData = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $institution = $_POST["institution"];
    $semester = $_POST["semester"];
    $mobile = $_POST["mobile"];
    $year = $_POST["year"];

    // Update user information in the database
    $updateSQL = "UPDATE user SET 
                  name = '$fullName',
                  email = '$email',
                  institution = '$institution',
                  semester = '$semester',
                  mobile = '$mobile',
                  year = '$year'
                  WHERE id = '$userID'";

    if ($conn->query($updateSQL) === TRUE) {
        // Redirect to account page after successful update
        $error_message="Updated successfully !";
    } else {
        // Handle error
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="account.css" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/c57ecf9603.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="top">
        <div class="logo">
            <a href="home.php">
                <img src="logo.png" alt="Logo" />
            </a>
        </div>
        <ul class="navbar">

        <?php
      if (isset($_SESSION["user_type"])) {

        if ($_SESSION["user_type"] == 2){
          
        
        ?>
        <li><a href="authorization.php">Authorize a teacher</a></li>
      <?php }} ?>
            <li class="dropdown">
                <a href="semester.php">Semester</a>
                <ul class="dropdown-content">
                </ul>
            </li>
            <?php
            if (isset($_SESSION["user_id"])) {
                ?>
                <li><a href="suggestion.php">Suggestion</a></li>
            <?php } ?>
            <li><a href="notice.php">Notice Board</a></li>
            <?php
            if (isset($_SESSION["user_id"])) {
                ?>
                <li><a href="video.php">Videos</a></li>
                <li><a href="podcast.php">Podcast</a></li>
            <?php } ?>
            <li class="dropdown">
                <a href="#">Others</a>
                <ul class="dropdown-content">
                    <?php
                    if (isset($_SESSION["user_id"])) {
                        ?>
                        <li><a href="feedback.php">Feedback</a></li>
                    <?php } ?>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="teachers.php">Teachers Portal</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </li>
        </ul>
        <?php
        if (isset($_SESSION["user_id"])) {
            ?>
            <div class="account-settings">
                <a class="account">
                    <i class="fa-solid fa-user"></i>
                </a>
                <div class="user-account-items">
                    <div class="acct-name">
                        <?php echo $_SESSION["user_name"]; ?>
                    </div>

                    <div class="horizontal-line"></div>

                    <a class="type" href="account.php">
                        <div class="logo"><i class="fa-solid fa-gear"></i></div>
                        <div class="name">Manage Account</div>
                    </a>
                    <a class="type" href="change_password.php">
                        <div class="logo"><i class="fa-solid fa-user-pen"></i></div>
                        <div class="name">Change Password</div>
                    </a>
                    <a class="type logout" href="signout.php">
                        <div class="logo "><i class="fa-solid fa-right-from-bracket"></i></div>
                        <div class="name">Logout</div>
                    </a>
                </div>
            </div>
        <?php } else {
            ?>
            <a href="signin.php" class="sign-in">
                <button>
                    Sign In
                </button>
            </a>
            <?php
        }
        ?>
        <script src="home.js"></script>
    </div>
    <div class="bottom">
        <form action="account.php" method="post" class="account-form">
            <div class="successful">
                <?php
                if (isset($error_message)) {
                    echo $error_message;
                }
                ?>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="<?php echo $userData['name']; ?>" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $userData['email']; ?>" />
            </div>
            <div class="form-group">
                <label for="institution">Institution</label>
                <input type="text" name="institution" id="institution"
                    value="<?php echo $userData['institution']; ?>" />
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" name="semester" id="semester" value="<?php echo $userData['semester']; ?>" />
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="<?php echo $userData['mobile']; ?>" />
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" value="<?php echo $userData['year']; ?>" />
            </div>
            <button type="submit" class="submit-button">Save Changes</button>
        </form>
    </div>

</body>

</html>