
<html>
<head>
<body>

<form method="get" action="<?php $_SERVER ['PHP_SELF']?>">

      Numero 1 :
      <input type="text" name="num1">
    Numero 2:
    <input type="text" name="num2">
    <input type="submit" name="calcolo" value="CALCOLO">
</form>



</body>
</head>
</html>


<?php

$num1 = $_GET ['num1'];
$num2 = $_GET ['num2'];
$tot = $num1+$num2;

echo "$tot";

?>