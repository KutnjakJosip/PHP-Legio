<?php
  require_once 'head.php';
  $_SESSION['message'] = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(!isset($_POST['email']) || !isset($_POST['password'])) 
    {
      $_SESSION['message'] = 'Email ili Lozinka nisu postavljeni';
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $isActive = $_POST['is-active'];

    if($password !== $passwordRepeat) 
    {
      $_SESSION['message'] = 'Lozinke se ne podudaraju';
    }

    if(isset($email) && isset($password)&& isset($passwordRepeat) && isset($firstName)&& isset($lastName) && $password === $passwordRepeat)
    {
      $password = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = 'INSERT INTO users (email, password, first_name, last_name, is_active) 
              VALUES(:email, :password, :first_name, :last_name, :is_active)';
      
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':first_name', $firstName);
      $stmt->bindParam(':last_name', $lastName);
      $stmt->bindParam(':is_active', $isActive);
      $stmt->execute();
  
      $_SESSION['message'] = 'Registracija uspješna!';
    }
  }
  echo $head;
  echo $header;
?>

<div id="reg">
  <h1>Registracija</h1>
  <?php echo "<p style='color:#333; text-align:center;width:100%;display:block;'>". $_SESSION['message']  ."</p>"; ?>
  <form class="form" role="form" method="POST" action="registracija.php">
    <div>
      <input type="hidden" name="id" />
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required="">
    </div>
                
    <div>    
      <label for="password">Lozinka</label>              
      <input type="password" name="password" id="password" required="">         
    </div>

    <div>          
      <label for="password-repeat">Ponovite lozinku</label>              
      <input type="password" name="password-repeat" id="password-repeat" required="">             
    </div> 

    <div>
      <label for="first-name">Ime</label>
      <input type="text" name="first-name" id="first-name">
    </div>

    <div>
      <label for="last-name">Prezime</label>
      <input type="text" name="last-name" id="last-name">
    </div>
                
    <div>
      <div>Želim primati obavijesti</div>
      <label  for="is-active">
        <input  type="radio" name="is-active" id="is-active" value="0" checked>Ne
      </label>
    </div>

    <div>                 
      <label for="is-active">
        <input type="radio" name="is-active" id="is-active" value="1">Da
      </label>
    </div>

    <input type="submit" value="Registriraj se" name"registracija">
  </form>
</div>
 
<?php
  echo $footer;
?>