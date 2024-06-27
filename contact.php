<?php
    require_once 'head.php';
    echo $head;
    echo $header;
?>

<div id="map">
    <iframe id="karta" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.829296867457!2d16.071713615713225!3d45.71446127910465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47667e543ebb2c65%3A0xe159703d90972cf3!2sVeleu%C4%8Dili%C5%A1te+Velika+Gorica!5e0!3m2!1sen!2shr!4v1515655620181" width="100%" height="500" style="border:0; padding: 5px; margin: 0 auto;" allowfullscreen></iframe>
</div>

<form id="contact_form" method="POST" action="?" name="kontakt">
    <h1>Kontakt</h1>

    <div class="forma">
        <label for="ime">Ime *</label>
        <input type="text" id="ime" name="ime" placeholder="Ime.." required>
    </div>

    <div class="forma">
        <label for="prezime">Prezime *</label>
        <input type="text" id="prezime" name="prezime" placeholder="Prezime.." required>
    </div>   
           
    <div class="forma">
        <label for="gradovi">Država:</label>
		<select id="country" name="country">
			<option value="GA">Gabon</option>
			<option value="HR" selected>Hrvatska</option>
			<option value="LU">Luksemburg</option>
            <option value="AF">Afganistan</option>
            <option value="IE">Irska</option>
		</select>
    </div>
        
    <div class="forma">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" placeholder="E-mail.." required>
    </div>

    <div class="clear"></div>

    <div id="primanje">
        <label for="obavijesti" style="width:98%;">Želim primati obavijesti</label>
        <input type="radio" id="da" name="obavijeti" >Da
        <input type="radio" id="ne" name="obavijeti" >Ne
    </div><br/> 

    <div id="komic">
        <label for="poruka"  style="width:90%;text-align:left;display:inline-block;">Poruka</label>
        <textarea id="poruka" name="poruka" placeholder="Unesite tekst.." style="height:200px"></textarea>
    </div>  

    <input type="submit"  onclick="alert('Vasa poruka je uspjesno poslana!');"  value="Pošalji"></input><br/><br/><br/>
</form>

<?php
    if($_POST)
    {
        $name = $_POST['ime'];
        $lastname = $_POST['prezime'];
        $email = $_POST['email'];
        $to = "apeterlic@gmail.com";
        $subject = "Nova poruka!";

        $headers = "Content-Type: text/html; charset=UTF-8";
        $message = $_POST['poruka'];

        $message = <<<EMAIL

        Ime i prezime: $name $lastname

        Poruka: $message

EMAIL;

        mail($to, $subject, $message, $headers);

    }

?>
 
 <?php
    echo $footer;
?>