<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>anonim.io</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Name</label>
            <input type="text" name="fname" placeholder="Name" required>
          </div>
          <div class="field input">
            <label>Surname</label>
            <input type="text" name="lname" placeholder="Surname" required>
          </div>
        </div>
        <div class="field input">
          <label>Username</label>
          <input type="text" name="user" placeholder="Username" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Sigh up">
        </div>
      </form>
      <div class="link">Do you already have an account? <a href="login.php">Log in.</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>