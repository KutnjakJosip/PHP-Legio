<?php
  require_once 'head.php';
  echo $head;
  echo $header;
?>

<section>
  <p>
    <?php
      $ime = $_POST['ime'];
      $prezime = $_POST['prezime'];
      $email = $_POST['email'];
      $komentar = $_POST['komentar'];
        
      $dbc = mysqli_connect('localhost', 'root', 'root', 'baza') or die('Error connecting to MySQL server.');
      $dbc->set_charset('utf8');

      $query = "INSERT INTO dojmovi (ime, prezime, email, komentar) 
                VALUES ('$ime','$prezime', '$email', '$komentar')";
      
      $result = mysqli_query($dbc, $query) or die('Error querying databese.');	
      
      mysqli_close($dbc);

      header('Location: dojmovnik.php');
      die;
    ?>
  </p>
</section>

<?php echo $footer; ?>