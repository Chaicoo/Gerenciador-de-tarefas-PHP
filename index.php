<?php

session_start();

if(!isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}

if(isset($_GET['task_name'])){
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if(isset($_GET['clear'])){
    unset($_SESSION['task']);
}


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Gerenciador de tarefas PHP</title>
</head>
<body>

<div class="container">
    <dic class="header">
        <h1>Gerenciador de tarefas PHP</h1>
    </dic>
    <div class="form">
        <form action="" method="get">
            <label for="task_name">Tarefa: </label>
                <input type="text" name="task_name" placeholder="Nome da tarefa">
                    <button type="submit">Cadastrar</button>
        </form>
    </div>
    <div class="separator">

    </div>

    <div class="list-task">
        <?php
            if(isset($_SESSION['tasks'])){
                echo "<ul>";

                foreach($_SESSION['tasks'] as $key => $task){
                    echo "<li>
                    <span>$task</span>
                    <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button>
                        <script>
                            function deletar$key(){
                                if(confirm('Confirmar remoção?')){
                                    window.location = 'http://gerenciador-de-tarefas-php.vercel.app/?key=$key';
                                }
                            }
                        </script>
                    </li>";
                }

                echo "</ul>";
            }
        ?>
        <form action="" method="get">
            <input type="hidden" name="clear" value="clear">
            <button type="submit" class="btn-clear">Apagar Tarefas</button>
        </form>
    </div>

    <div class="footer">
        <p>Código de <a href="https://github.com/Chaicoo">Chico</a></p>
    </div>

</div>

</body>
</html>
