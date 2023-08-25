<?php
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

// echo "Connected successfully to the hub database!";
?>
<?php
// Start the session
session_start();
?>



<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="semester.css" />
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
    <div class="semester-group">
      <h2>Semesters</h2>

      <?php
      // SQL query to fetch data from the "semester" table
      $sql = "SELECT semester_no, subject FROM semester";

      // Execute the query and get the result set
      $result = $conn->query($sql);

      // Check if any data is returned from the query
      if ($result->num_rows > 0) {
        // Initialize an associative array to store subjects by semester
        $subjectsBySemester = array();

        // Declare the $semesterNoArray to store semester names
        $semesterNoArray = ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th"];

        // Loop through the result set and group subjects by semester
        while ($row = $result->fetch_assoc()) {
          $semesterNo = $row["semester_no"];
          $subject = $row["subject"];

          // Store subjects in the associative array using semester_no as the key
          if (!isset($subjectsBySemester[$semesterNo])) {
            $subjectsBySemester[$semesterNo] = array();
          }
          $subjectsBySemester[$semesterNo][] = $subject;
        }

        // Loop through each semester and display the subjects
        foreach ($subjectsBySemester as $semesterNo => $subjects) {
          ?>
          <div class="semester-gp">
            <div class="semester-link">
              <?php echo $semesterNoArray[$semesterNo - 1] . " Semester"; ?>
            </div>
            <div class="subject-group">
              <?php
              foreach ($subjects as $subject) {
                ?>
                <a class="subject-link" href="subject.php?subject=<?php echo $subject; ?>&came_from=semester">
                  <?php echo $subject; ?>
                </a>
                <?php
              }
              ?>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>

  </div>
</body>

<script src="semester.js"></script>
</html>

<?php

// Close the database connection
$conn->close();
?>