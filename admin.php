<?php
	require_once 'head.php';
	echo $head;
	echo $header;
?>

<div id="admin">
	<form action="unos.php" method="post" id="dodavanje"> 
		<button type="submit" style="padding: 18px;" class="dodajVijesti" value="Dodaj vijest">Dodaj vijest</button>
		<button class="dodajVijesti"><a   href="brisanjeDojmova.php">Obriši dojmove</a></button>
	</form>

	<div style="border:none">
		<h1>Vijesti:</h1>
	</div>
		
	<?php
		$dbc = mysqli_connect('localhost','root','','baza') or die('Error connecting to MySQL server.');	

		if(isset($_POST))
		{
			if (isset($_POST['delete']))
			{
				$id = $_POST['id'];
				$query = "DELETE FROM vijest WHERE id = $id";
				$result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');		
			}		
				
			if (isset($_POST['hide']))
			{
				$id = $_POST['id'];
				$query = "UPDATE vijest SET sakriti = 1 WHERE id = $id";
				$result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');			
			}

			if (isset($_POST['show']))
			{
				$id = $_POST['id'];
				$query = "UPDATE vijest SET sakriti = 0 WHERE id = $id";
				$result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');			
			}
		}

		$query = "SELECT * FROM vijest";	
		$result = mysqli_query($dbc, $query) or die('Pogreška u spajanju s bazom.');

		while($row = mysqli_fetch_assoc($result) ) 
		{
			echo '<div>
					<h2>' . $row['naslov'] . '</h2><br /> 
					<b>Kratki sadržaj: </B>' . $row['sazetak']. '<br /> 
					<b>Vijest: </B>' .  $row['vijest']. ' <br />
					<b>Kategorija: </B>' .  $row['kategorija']. ' <br />
					<b>Sakriveno: </B>' . $row['sakriti']. '<br /> ';
			echo '
				<form name="admin" action="admin.php" method="post"> 
					<input type="checkbox" name="delete" value="izbrisi">Izbriši vijest<br><br>
						<input type="checkbox" name="hide" value="sakrij">Sakrij vijest<br><br>
						<input type="checkbox" name="show" value="pokazi">Pokaži vijest<br><br>
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