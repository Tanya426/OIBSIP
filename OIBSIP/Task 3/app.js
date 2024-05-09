const form = document.getElementById('add-task-form');
const newTaskInput = document.getElementById('new-task');
const pendingTasksList = document.getElementById('pending-tasks');
const completedTasksList = document.getElementById('completed-tasks');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const newTask = newTaskInput.value;
    const li = document.createElement('li');
    li.innerHTML = `
        <span>${newTask}</span>
        <button class="complete">Complete</button>
        <button class="delete">Delete</button>
    `;
    pendingTasksList.appendChild(li);
    newTaskInput.value = '';
});

pendingTasksList.addEventListener('click', (e) => {
    if (e.target.matches('.complete')) {
        e.target.parentElement.classList.add('completed');
        completedTasksList.appendChild(e.target.parentElement);
    } else if (e.target.matches('.delete')) {
        e.target.parentElement.remove();
    }
});

completedTasksList.addEventListener('click', (e) => {
    if (e.target.matches('.delete')) {
        e.target.parentElement.remove();
    }
});