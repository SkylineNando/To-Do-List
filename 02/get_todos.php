<?php
$file = "todos.txt";
if (file_exists($file)) {
    $todos = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($todos as $todo) {
        echo "<li>$todo</li>";
    }
}
?>
