<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="configurador.css">
</head>
<body>
<table>


        <tr>
            <th>Nome</th>
            <th>Processador</th>
            <th>Placa mae</th>
            <th>Placa de video</th>
            <th>Memoria</th>
            <th>Disco</th>
            <th>Fonte</th>
            <th>Torre</th>
        </tr>
        <?php
            session_start(); // Inicia a sessão/recebe o nome
            include 'connect.php';
            
            // Recupera o nome do utilizador da sessão
            $Nome = $_SESSION['Nome'];
            $consulta_componentes = "SELECT * FROM Componentes WHERE Nome = '$Nome'";
            $resultado_componentes = mysqli_query($liga, $consulta_componentes);
            $nregistos = mysqli_num_rows($resultado_componentes);

            for ($i=0; $i<$nregistos; $i++)
            {
            $registo = mysqli_fetch_assoc($resultado_componentes);
            echo '<tr><td>' .$registo['id']. '</td>';
            echo '<td>' .$registo['processador']. '</td>';
            echo '<td>' .$registo['PlacaMae']. '</td>';
            echo '<td>' .$registo['PlacaVideo']. '</td>';
            echo '<td>' .$registo['Memoria']. '</td>';
            echo '<td>' .$registo['Disco']. '</td>';
            echo '<td>' .$registo['Fonte']. '</td>';
            echo '<td>' .$registo['Torre']. '</td></tr>'; 
                
        };
        ?>
</body>
</html>