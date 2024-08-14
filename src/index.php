<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Administrador de tareas</h1>

        <div class="row">
            <!-- Lista de tareas -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tareas
                    </div>
                    <div class="card-body">
                        <ul id="taskList" class="list-group">
                            <!-- Tareas se mostrarán aquí -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Formulario para agregar tareas -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Agregar nueva tarea
                    </div>
                    <div class="card-body">
                        <form id="addTaskForm">
                            <div class="mb-3">
                                <label for="taskTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="taskTitle" required>
                            </div>
                            <div class="mb-3">
                                <label for="taskDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="taskDescription" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Tarea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const token = "aeecfbe3c407e10849722432630fbbe197f0496aa48e489ceae48af501d4b499";

        document.getElementById('addTaskForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const title = document.getElementById('taskTitle').value;
            const description = document.getElementById('taskDescription').value;

            fetch('http://127.0.0.16/add_task.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    token: token,
                    title: title,
                    description: description
                })
            })
                .then(response => response.json())
                .then(data => {
                    alert('Tarea agregada!');
                    loadTasks();
                    document.getElementById('addTaskForm').reset();
                })
                .catch(error => console.error('Error:', error));
        });

        function loadTasks() {
            fetch('http://127.0.0.16/list_tasks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    token: token
                })
            })
                .then(response => response.json())
                .then(data => {
                    const taskList = document.getElementById('taskList');
                    taskList.innerHTML = '';

                    data.forEach(task => {
                        const listItem = document.createElement('li');
                        listItem.className = 'list-group-item';
                        listItem.textContent = `${task.title}: ${task.description}`;
                        taskList.appendChild(listItem);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        loadTasks();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>