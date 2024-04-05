<?php include "header.php" ?>
<div class="container">
  <div class="col-sm-12 text-center">
    <div class="py-3">
      <img src="assets/logo.png" alt="USG Logo">
    </div>
    <div class="my-3">
      <p class="fw-600 fs-4">Give creadentials to sign in your account</p>
    </div>

  </div>
  <div class="row justify-content-center">
    <div class="col-sm-5 text-center">
      <form method="post" action="login.php">
        <div>
          <div class="mb-3">
            <label class="form-label d-block text-start">Email address</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" id="email" name="email">
          </div>
          <div class="mb-3">
            <label class="form-label d-block text-start">Password</label>
            <input type="password" class="form-control" placeholder="Enter Your Password" id="password" name="password">
          </div>
          <p class="btn btn-dark mt-3" id="submit" type="submit">Login</p>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submit").addEventListener("click", function () {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "login.php", true);
      xhr.setRequestHeader("Content-Type", "application/json"); // Set content type to JSON
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response[0].Message === "Success") {
              alert("Login successful!");
              // Redirect to dashboard or perform other actions
            } else {
              alert("Login failed: " + response[0].Message);
              alert("Email: " + response[0].Email);
            }
          } else {
            alert("Error: " + xhr.status);
          }
        }
      };
      // Send JSON payload containing email and password
      xhr.send(JSON.stringify({ Email: email, Password: password }));
    });
  });
</script>


<?php include "footer.php" ?>