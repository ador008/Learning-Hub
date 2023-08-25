<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "hub";

session_start();

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subject = $_GET['subject'];
if (isset($_GET['came_from'])) {
    $came_from = $_GET['came_from'];
} else {
    $came_from = "suggestion";
}

// SQL query to count the number of chapters for the given subject
$sql = "SELECT COUNT(*) AS chapterCount FROM chaptername WHERE subject = '$subject'";

// Execute the query and get the result set
$result = $conn->query($sql);

// Check if any data is returned from the query
if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the chapter count from the result
    $chapterCount = $row["chapterCount"];
} else {
    // If no chapters are found for the subject, set the count to 0
    $chapterCount = 0;
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="subject.css" />
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
                    <div class="logo"><i class="fa-solid fa-user-pen"></i></div>
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

    <?php
    if (isset($_SESSION["user_type"])) {
        if ($_SESSION["user_type"] > 0) { ?>
            <div class="buttons">
                <div class="new-question">
                    <a href="new_question.php" class="add">+ Add New Question</a>
                </div>
                <div class="new-chapter">
                    <a href="new_chapter.php" class="add">+ Add New Chapter</a>
                </div>
            </div>
        <?php }
    } ?>

    <div class="semester-group">
        <h1>
            <?php echo $subject; ?>
        </h1>
    </div>

    <div class="pages">
        <?php
        // Initialize a variable to keep track of the running page number
        $runningChapterNumber = (isset($_GET['chapter']) && $_GET['chapter'] != null) ? $_GET['chapter'] : 1;
        // Loop through the chapters and display each chapter's page number
        for ($i = 1; $i <= $chapterCount; $i++) {
            ?>
            <a class="page-number <?php echo $i == $runningChapterNumber ? "active" : ""; ?>"
               href="subject.php?subject=<?php echo $subject; ?>&chapter=<?php echo $i; ?>&came_from=<?php echo $came_from; ?>">
                <?php echo $i; ?>
            </a>
        <?php
        }
        ?>
    </div>
    <?php
    $sql = "SELECT chapter AS chapterName FROM chaptername WHERE subject = '$subject' AND chapter_number = '$runningChapterNumber' ";
    // Execute the query and get the result set
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // Get the chapter count from the result
        $chapterName = $row["chapterName"];
    } else {
        // If no chapters are found for the subject, set the count to 0
        $chapterName = "Error";
    }
    ?>
    <h2>
        <?php echo $chapterName; ?>
    </h2>

    <?php
    // SQL query to fetch data from the "subject" table for the selected chapter
    if ($came_from == "suggestion") {
        $sql = "SELECT id, question_name, pdf_download, video_link FROM subject WHERE subject = '$subject' AND chapter = '$runningChapterNumber' AND is_suggestion = 1";
    } else {
        $sql = "SELECT id, question_name, pdf_download, video_link FROM subject WHERE subject = '$subject' AND chapter = '$runningChapterNumber'";
    }
    // Execute the query and get the result set
    $result = $conn->query($sql);
    $ser = 1;
    // Check if any data is returned from the query
    
// ... Previous code ...

if ($result->num_rows > 0) {
?>
    <table class="notice-table">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Question Name</th>
                <th>PDF Download</th>
                <th>Video Link</th>
                <?php
                if (isset($_SESSION["user_type"])) {
                    if ($_SESSION["user_type"] > 0) { ?>
                        <th>Edit</th>
                        <th>Delete</th>
                    <?php }
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the result set and display the data in the table
            if ($result->num_rows > 0) {
                $ser = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $ser . "</td>";
                    $ser++;
                    echo "<td>" . $row['question_name'] . "</td>";
                    echo "<td><a href='download.php?file=" . urlencode($row['pdf_download']) . "'>Download</a></td>";
                    echo "<td><a href='" . $row['video_link'] . "' target='_blank'>Watch</a></td>";
                    if (isset($_SESSION["user_type"])) {
                        if ($_SESSION["user_type"] > 0) {
                            echo "<td><a href='edit_question.php?id=" . urlencode($row['id']) . "&subject=" . urlencode($subject) . "&came_from=" . urlencode($came_from) . "&chapter=" . urlencode($runningChapterNumber) . "'>Edit</a></td>";
                            echo "<td><a href='delete_question.php?id=" . urlencode($row['id']) . "&subject=" . urlencode($subject) . "&came_from=" . urlencode($came_from) . "&chapter=" . urlencode($runningChapterNumber) . "'>Delete</a></td>";
                        }
                    }
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "No data available for this chapter.";
}
$conn->close();
?>

</div>
</body>
</html>
