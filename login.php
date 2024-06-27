<?php
  require_once 'head.php';

  if(isset($_SESSION['user'])) 
  {
    header('Location: index.php');
    die;
  }

  $_SESSION['message'] = '';
 
  if($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(!isset($_POST['email']) && isset($_POST['password'])) 
    {
      $_SESSION['message'] = 'Niste upisali korisničko ime ili lozinku';
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'SELECT id, email, password, first_name, last_name, is_active FROM users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if(!$user) 
    { 
      $_SESSION['message'] = 'Korisnik ne postoji!';
    }

    if($user['is_active'] !== '1') 
    {
      $_SESSION['message'] = 'Korisnik nije aktivan!';
    }

    if(password_verify($password, $user['password'])) 
    {
      $_SESSION['user'] = $user;
      header('Location: index.php');
    }
    else 
    {
      $_SESSION['message'] = 'Krivo korisničko ime ili lozinka';
    }
}

echo $head;
echo $header;
?>

<div class="container">
  <h1>Login</h1>
  <?php echo "<p style='color:#333; text-align:center;width:100%;display:block;'>". $_SESSION['message']  ."</p>"; ?>
  
  <form class="form" role="form" method="POST" action="login.php" autocomplete="off">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control form-control-lg rounded-0" name="email" id="email" required="">
    </div>

    <div class="form-group">
      <label for="password">Lozinka</label>
      <input type="password" name="password" class="form-control form-control-lg rounded-0" id="password" required="">
    </div>
    
    <button type="submit" class="btn">Prijava</button>
  </form>

</div>

<?php
  echo $footer;
?>
