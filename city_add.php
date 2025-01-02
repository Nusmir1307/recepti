<?php
include_once "header.php";
?>
<H1>Dodaj kraj</H1>
<form action="city_insert.php" method="post">
    Vnesi kraj: <input type="text" name="title" /><br />
    Vnesi poštno številko: <input type="text" name="post_number" /><br />
 <input type="submit" value="Shrani" />
</form>

<?php
include_once "footer.php";
?>
