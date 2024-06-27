<?php
    require_once 'head.php';
    echo $head;
    echo $header;

    header('Content-Type: text/html; charset=UTF-8');

    $sql = 'SELECT ime, prezime, email, komentar FROM dojmovi';
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $dojmovi = $stmt->fetchAll();
?>

<div id="wrapp">
    <div id="dojmovi">
        <h1>Dojmovi</h1>
        
        <?php foreach($dojmovi as $dojam): ?>

            <div class="dojam">
                <p><span>Komentar: </span><?= $dojam['komentar'] ?></p>
                <p><span>by: </span><?= $dojam['ime'] ?></p>
            </div>

        <?php endforeach; ?>
        <br/><br/>
    </div>

    <form id="dojmovi_form" method="POST" action="skripta.php" name="kontakt">
        <h1>Ostavite vaš dojam</h1>

        <label for="ime">Ime *</label>
        <input type="text" id="ime" name="ime" placeholder="Ime.." required>

        <label for="prezime">Prezime *</label>
        <input type="text" id="prezime" name="prezime" placeholder="Prezime.." required>

        <label for="drzava">Država *</label>
        <input type="text" id="prdrzavaezime" name="drzava" placeholder="Država.." required>
    
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" placeholder="E-mail.." required>

        <label for="komentar">Komentar</label>
        <textarea id="komentar" name="komentar" placeholder="Unesite tekst.." style="height:100px"></textarea>

		<input type="submit" value="Pošalji">
    </form>
    
</div>
      
<?php echo $footer; ?>