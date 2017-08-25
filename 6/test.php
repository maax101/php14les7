<?php
if (isset($_GET['test_name']) && file_exists('tests/' . $_GET['test_name'])) {
    $path_file = 'tests/' . $_GET['test_name'];
    $temp      = file_get_contents($path_file);
    $test      = json_decode($temp, true);
    } else {
    http_response_code(404);
    echo '<h1>404 Not Found</h1><a href="list.php">На страницу выбора тестов</a>';
    exit(1);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="result1.php" method="GET">
    <input type="text" name="user_name" value="" placeholder="введите свое имя..." required="введите имя">
    <div>
    <?php foreach ($test as $key => $value) {
        echo '<br>'.$value['qstn'].'<br>';
        foreach ($value['answr'] as $answrs) {
            echo '<label><input type="radio" name="q'.$value['id'].'" value="'.$answrs.'">'.$answrs.'</label>'.PHP_EOL;
        }
    } ?>
    </div>
    <input type="submit" value="результат">
</form>
</body>
</html>
