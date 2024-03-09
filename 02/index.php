<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <style>
        #todoList {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>To Do List</h1>
    <form id="todoForm">
        <input type="text" id="todoItem" placeholder="Add a new task">
        <button type="submit">Add Task</button>
    </form>
    <ul id="todoList">
        
        <?php include 'get_todos.php'; ?>
    </ul>

    <script>
        document.getElementById('todoForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let todoItem = document.getElementById('todoItem').value;
            if (todoItem.trim() !== '') {
                addToDoItem(todoItem);
                saveToDoItem(todoItem);
                document.getElementById('todoItem').value = '';
            } else {
                alert('Please enter a task');
            }
        });

        function addToDoItem(todo) {
            let todoList = document.getElementById('todoList');
            let li = document.createElement('li');
            li.textContent = todo;
            todoList.appendChild(li);
        }

        function saveToDoItem(todo) {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_todo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log(xhr.responseText); // Optional: log response from add_todo.php
                }
            };
            xhr.send('todoItem=' + encodeURIComponent(todo));
        }
    </script>
</body>
</html>
