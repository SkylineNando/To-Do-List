<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todoItem = $_POST['todoItem'];
    $file = fopen("todos.txt", "a");
    fwrite($file, $todoItem . "\n");
    fclose($file);
}
?>
