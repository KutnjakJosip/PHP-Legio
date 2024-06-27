<?php
    require_once 'head.php';
    echo $head;
    echo $header;

	$naslov = $_POST['naslov'];
	$sazetak = $_POST['sazetak'];
	$vijest = $_POST['vijest'];
	$vr_kategorija = $_POST['kategorija'];
		
    if($vr_kategorija == 1)
      $kategorija = "Svijet";
    elseif($vr_kategorija == 2)
       $kategorija = "Hrvatska";
    elseif($vr_kategorija == 3)
       $kategorija = "Zanimljivosti";
    elseif($vr_kategorija == 4)
       $kategorija = "Italija";
    elseif($vr_kategorija == 5)
       $kategorija = "Rim";
    elseif($vr_kategorija == 6)
       $kategorija = "Legija";
    elseif($vr_kategorija == 7)
       $kategorija = "Tehnologija";
    elseif($vr_kategorija == 8)
       $kategorija = "Zabava";

	if (isset($_POST['sakriti'])){
		$sakriti=1;
		echo "Vijest je sakrivena.";
		
	} else {
	   $sakriti = 0;
        echo "<br/>" . $naslov;
        echo "<br/>" . $sazetak;
        echo "<br/>" . $vijest;
        echo "<br/>" . $kategorija;
	}
	
	$dbc = mysqli_connect('localhost', 'root', 'root', 'baza') or die('Error connecting to MySQL server.');

    $dbc->set_charset('utf8');
	
	$query = "INSERT INTO vijest (naslov, sazetak, vijest, kategorija, sakriti ) 
	VALUES ('$naslov','$sazetak', '$vijest', '$kategorija', '$sakriti' )";
	
    $result = mysqli_query($dbc, $query) or die('Error querying databese.');	
	
    mysqli_close($dbc);
    header('Location: admin.php');
    die;
?>
