const form = document.getElementById('addTaskForm');
const newTaskInput = document.getElementById('newTask');
const taskList = document.getElementById('taskList');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (newTaskInput.value.trim() === '') {
        return;
    }

    const newTask = document.createElement('li');
    newTask.textContent = newTaskInput.value.trim();
    newTask.addEventListener('click', () => {
        newTask.remove();
    });

    taskList.appendChild(newTask);
    newTaskInput.value = '';
});
