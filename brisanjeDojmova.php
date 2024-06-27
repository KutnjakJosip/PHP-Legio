<?php
	require_once 'head.php';
	echo $head;
	echo $header;
?>

<div id="admin">
	<div style="border:none">
		<h1>Dojmovi:</h1>
	</div>
			
	<?php
		$dbc = mysqli_connect('localhost','root','root','baza') or die('Error connecting to MySQL server.');
			
		if(isset($_POST))
		{
			if (isset($_POST['obrisi']))
			{
				$id = $_POST['id'];
				$query = "DELETE FROM dojmovi WHERE id = $id";
                $result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');
                    
                $message = "Dojam obrisan!";
                echo "<p style='color:#333; text-align:center;width:100%;'>". $message ."</p>";
			}		
		}

		$query = "SELECT * FROM dojmovi";
			
		$result = mysqli_query($dbc, $query) or die('Pogreška u spajanju s bazom.');

		while($row = mysqli_fetch_assoc($result) ) 
		{
			echo '<div><h2>Komentar: </h2> ' . $row['komentar']. '<br /> ' .  $row['ime']. ' <br />';
				
			echo '
				<form name="admin" action="brisanjeDojmova.php" method="post"> 
                    <input type="checkbox" name="obrisi" value="izbrisi">Izbriši vijest<br><br>
                    <input type="hidden" name="id" value="' .$row['id'].'"/>
					<input type="submit" value="Ažuriraj"><br><br>
				</form>
				</div>';		
		}

		mysqli_close($dbc);	
	?>

</div>

<?php
	echo $footer;
?>