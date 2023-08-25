<?php
// Start the session
session_start();

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

// Fetch podcast episodes from the database
$sql = "SELECT * FROM podcast";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="podcast.css" />
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

  <?php 
        if (isset($_SESSION["user_type"])) {
        if ($_SESSION["user_type"] > 0) {?>

<div class="new-podcast">
    <a href="new_podcast.php" class="add">+ Add New Podcast</a>
</div> <?php } }?>


    <table class="podcast-table">
        <thead>
            <tr>
                <th>Episode no</th>
                <th>Episode Name</th>
                <th>Play Online</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['episodename']; ?></td>
                    <td>
                        <audio controls>
                            <source src="music/<?php echo $row['audio']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </td>
                    <td><a href="download.php?file=<?php echo urlencode("music/" . $row['audio']); ?>">Download</a></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>