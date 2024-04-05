<?php include "header.php";
session_start(); // Start the session
if (!isset($_SESSION['Email']) || $_SESSION['Email'] !== true) {
  // User is not logged in, redirect to the login page
  header("Location: login_web.php");
  exit; // Stop further execution
}
?>

<div class="row">
  <div class="col-sm-auto">
    <aside>
      <p> USG App </p>
      <a href="./">
        <i class="fa fa-user-o" aria-hidden="true"></i>
        Conference List
      </a>
      <a href="#">
        <i class="fa fa-laptop" aria-hidden="true"></i>
        Users List
      </a>
      <a href="#">
        <i class="fa fa-clone" aria-hidden="true"></i>
        Add Conference
      </a>
    </aside>
  </div>
  <div class="col-sm-8 text-center">
    <div class="my-5 ">
      <p class="fw-bold fs-2">Conference List</p>
    </div>
    <?php include "conferencedetails.php" ?>
  </div>
</div>
<?php include "footer.php" ?>