<?php
$test_list = [];
$test_dir  = opendir('tests/');
while (false !== ($entry = readdir($test_dir))) {
    if ($entry != "." && $entry != ".." && pathinfo($entry, PATHINFO_EXTENSION) == 'json') {
        $test_list[] = pathinfo($entry, PATHINFO_FILENAME);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Загруженые тесты</title>
</head>
<body>
<p><h2>Список тестов:</h2></p>
<?php
foreach ($test_list as $name) {
    echo '<br><li>' . $name . '</li>
	<form action="test.php" method="GET">
		<input type="hidden" name="test_name" value="' . $name . '.json">
		<input type="submit" value="пройти тест">
	</form>';
}
?>
<br><a href="admin.php">Администрация</a><br/>
</body>
</html>