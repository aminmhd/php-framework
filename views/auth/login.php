
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form | CodingNepal</title>
  <link rel="stylesheet" href="<?= asset("css/style.css") ?>">
</head>
<body>
  <?php include "views/notify.php" ?> 
  <div class="wrapper">
    <form method="post" action="<?= route("login") ?>">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="<?= route("registerform") ?>">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>


