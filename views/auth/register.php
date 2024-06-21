
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
    <form method="post" action="<?= route("register") ?>">
      <h2>Register</h2>
      <div class="input-field">
        <input type="text" name="name" required>
        <label>Enter your Name</label>
      </div>
        <div class="input-field">
        <input type="text" name="username" required>
        <label>Enter your Username</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your Email</label>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>


