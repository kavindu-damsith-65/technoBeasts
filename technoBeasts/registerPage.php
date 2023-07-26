<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <h2 class="card-header">Registration</h2>

      <?php
      if (isset($_GET['error'])) {
          $error_message = $_GET['error'];
          echo '<div class="alert alert-danger">' . $error_message . '</div>';
      }
      ?>

      <div class="card-body">
        <form id="registrationForm" method="POST" action="php/register.php">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          <div class="text-center pt-2"  >
            <a href="login.php"  style="text-decoration:none">Alrady Registered? Log In</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="js/script.js"></script>
</body>
</html>
