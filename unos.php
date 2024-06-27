<?php
	require_once 'head.php';
	echo $head;
	echo $header;
?>

<section style="width:100%; margin:0 auto">
	<form name="vijest" id="unos" action="unosV.php" method="POST">
		<h2 style="text-align:center;">Dodaj vijest</h2>
		Naslov:<br/> <input type="text" name="naslov"><br/>	
		<textarea cols="30" rows="5" name="sazetak" placeholder="Kratki sadržaj vijesti."></textarea><br/>
		<textarea cols="30" rows="5" name="vijest" placeholder="Cijeli tekst vijesti."></textarea><br/>
		
		<select name="kategorija">
			<option value="1">Svijet</option>
			<option value="2">Hrvatska</option>
			<option value="3">Zanimljivosti</option>
			<option value="4">Italija</option>
			<option value="5">Rim</option>
			<option value="6">Legija</option>
			<option value="7">Tehnologija</option>
			<option value="8">Zabava</option>
		</select>
			
		<label>
			<input type="checkbox" value="option1" name="sakriti"/>Sakrij vijest:
		</label>
		
		<input type="submit" value="Dodaj"><br>
	</form>	  
</section>

<?php
	echo $footer;
?>