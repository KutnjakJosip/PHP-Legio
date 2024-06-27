<?php
    require_once 'head.php';
    echo $head;
    echo $header;

    $sql = 'SELECT id, naslov, sazetak, vijest, kategorija FROM vijest where sakriti = 0';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $vijesti = $stmt->fetchAll();
?>
   
<div id="vijesti">
  <h1>Vijesti:</h1>
  <?php foreach($vijesti as $vijest): ?>
    <div class="vijest">
        <h1><?= $vijest['naslov'] ?></h1>
        <p><span>Vijest: </span>
            <?php echo strip_tags($vijest['vijest']); ?>
        </p>
      <!-- <p><span>Sažetak: </span>/<?= $vijest['sazetak'] ?></p>-->
        <p><span>Kategorija: </span><?= $vijest['kategorija'] ?></p>
    </div>

    <?php endforeach; ?>
</div><br/><br/><br/>

<?php echo $footer; ?>
