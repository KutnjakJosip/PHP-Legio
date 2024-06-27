<?php

if(isset($_SESSION['user'])){
$header = <<<EOT
    <header>
        <nav>
            <a href="index.php">HOME</a>
            <a href="onama.php">O NAMA</a>
            <a href="dojmovnik.php">DOJMOVI</a>
            <a href="contact.php">KONTAKT</a>
            <a href="admin.php">ADMIN</a>
            <a href="logout.php">ODJAVA</a>
        </nav>
    <div class="clear"></div>
    </header>
EOT;
}

else{
    $header = <<<EOT
    <header>
        <nav>
            <a href="index.php">HOME</a>
            <a href="onama.php">O NAMA</a>
            <a href="dojmovnik.php">DOJMOVI</a>
            <a href="contact.php">KONTAKT</a>
            <a href="registracija.php">REGISTRACIJA</a>
            <a href="login.php">PRIJAVA</a>
        </nav>
    <div class="clear"></div>
    </header>
EOT;
}

header('Content-Type: text/html; charset=UTF-8');

$header = sprintf($header, APP_NAME);


//git add str
//git commit -m "poruklsan"
//git push -u origin master