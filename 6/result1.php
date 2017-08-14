<?php
$ot = 0;
$not = 0;
if (!isset ($_GET['q1']) || !isset($_GET['q2']) || !isset($_GET['q3'])) {
	echo 'Не все варианты выбраны. Вернитесь назад.<br> '.PHP_EOL;
exit();} else {
	if ($_GET['q1']=='b') {
		$ot++;
	} else {
		$not++;
	}
	if ($_GET['q2']=='a') {
		$ot++;
	} else {
		$not++;
	}
	if ($_GET['q3']=='c') {
		$ot++;
	} else {
		$not++;
	}
}
$user = htmlspecialchars((string) $_GET['user_name']);
file_put_contents('allresult.php','<br>'. date('d.m.y').'. '.$user.': правильно - '.$ot.', не правильно - '.$not.'<br>', FILE_APPEND);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Результаты</title>
</head>
<body>
<div>
<p><h2> Ваш результат, <?=$user?>: </h2></p>
<p>правильно: <?=$ot?></p>
<p>не правильно: <?=$not?></p>
</div>
<div>
	<form action="cert.php" method="get">
		<input type="hidden" name="user" value="<?=$user?>">
		<input type="hidden" name="ot" value="<?=$ot?>">
		<input type="hidden" name="not" value="<?=$not?>">
		<input type="submit" value="получить сертификат" >

	</form>
</div>
<a href="admin.php">Администрация</a>
</body>

</html>