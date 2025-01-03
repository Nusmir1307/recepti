<?php

include_once "db.php";
$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);


$row = $stmt->fetch();

?>
<?php
include_once "header.php";
?>
<H1>Uredi kategorije</H1>
<form action="categorie_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
   <input type="text" name="title" value="<?php echo $row['title'];?>"placeholder="vnesi kategorijo" required="required" class="form-control"/><br />
   <textarea name="description" placeholder="Vnesi opis" class="form-control"><?php echo $row['description'];?></textarea><br />
    <input type="submit" value="Shrani" />
</form>
<?php
include_once "footer.php";
?>
