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

// Get question ID from URL
$questionId = $_GET["id"];

// Fetch existing question details from the database
$sql = "SELECT * FROM subject WHERE id = '$questionId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subject = $row["subject"];
    $semester = $row["semester"];
    $chapter = $row["chapter"];
    $question = $row["question_name"];
    $video = $row["video_link"];
    $pdf = $row["pdf_download"];
} else {
    // Handle error, question not found
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $updatedQuestion = $_POST["question"];
    $updatedVideo = $_POST["video"];
    $updatedPdf = $_POST["pdf"];
    
    // Update question details in the database
    $updateSQL = "UPDATE subject SET question_name = '$updatedQuestion', video_link = '$updatedVideo', pdf_download = '$updatedPdf' WHERE id = '$questionId'";

    if ($conn->query($updateSQL) === TRUE) {
        // Redirect to subject page after successful update
        header("Location: subject.php?subject=$subject&chapter=$chapter");
        exit();
    } else {
        // Handle error
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="edit_question.css" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/c57ecf9603.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons&display=swap" rel="stylesheet">

</head>

<body>
    <div class="top">
        <!-- Your top navigation content -->
        <div class="logo">
            <a href="home.php">
                <img src="logo.png" alt="Logo" />
            </a>
        </div>
        <ul class="navbar">

            <?php
            if (isset($_SESSION["user_type"])) {

                if ($_SESSION["user_type"] == 2) {


            ?>
                    <li><a href="authorization.php">Authorize a teacher</a></li>
            <?php }
            } ?>
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
    <form action="edit_question.php?id=<?php echo $questionId; ?>" method="post" class="account-form">
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" readonly />
    </div>

    <!-- Add a hidden input field for semester -->
    <input type="hidden" name="semester" value="<?php echo $semester; ?>">

    <div class="form-group">
        <label for="chapter">Chapter</label>
        <input type="text" name="chapter" id="chapter" value="<?php echo $chapter; ?>" readonly />
    </div>

    <div class="form-group">
        <label for="question">Question</label>
        <input type="text" name="question" id="question" value="<?php echo $question; ?>" />
    </div>

    <div class="form-group">
        <label for="pdf">PDF File</label>
        <input type="text" name="pdf" id="pdf" value="<?php echo $pdf; ?>" />
    </div>

    <div class="form-group">
        <label for="video">Video Link</label>
        <input type="text" name="video" id="video" value="<?php echo $video; ?>" />
    </div>

    <button type="submit" class="submit-button">Save Changes</button>
</form>

    </div>
</body>

</html>
