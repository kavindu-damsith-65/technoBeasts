<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <h2 class="card-header">Log In</h2>


      <div class="card-body">
        <form id="loginForm" method="POST" action="php/register.php">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Log In</button>
          </div>
          <div class="text-center pt-2"  >
            <a href="registerPage.php"  style="text-decoration:none">Not  Registered? Register Now</a>
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
