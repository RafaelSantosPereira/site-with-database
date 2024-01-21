<?php
        session_start(); // Inicia a sessão
        if (!isset($_SESSION['Nome'])) {
            // Se não estiver logado, redireciona para a página de login
            header("Location: user.html");
            exit;
        }
        include 'connect.php';
        // RecuperA o nome do utilizador da sessão
        $Nome = $_SESSION['Nome'];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            
            // o "id" funciona apenas como o nome da configuração sendo possivel 
            //haver dois nomes iguais em contas diferentes mas nao na mesma conta
            $id = $_POST["ID"];
            $Processador = $_POST["Processador"];
            $PlacaMae = $_POST["Placa_mae"];
            $PlacaVideo = $_POST["Placa_video"];
            $Memoria = $_POST["Memoria"];
            $Disco = $_POST["Disco"];
            $Fonte = $_POST["Fonte"];
            $Torre = $_POST["Torre"];

           

            $ProcuraInsert = "SELECT * FROM Componentes WHERE id = '$id' AND Nome = '$Nome'" ;
            $ResultProcura = mysqli_query($liga, $ProcuraInsert);
            $RegistoInsert = mysqli_fetch_assoc($ResultProcura);

            if ($RegistoInsert) {
                header("Location: configurador.php?erro=1");
            }
            else

            $inserir_componentes_query = "INSERT INTO Componentes (id, processador, PlacaMae, PlacaVideo, Memoria, Disco, Fonte, Torre, Nome) VALUES ('$id', '$Processador', '$PlacaMae', '$PlacaVideo', '$Memoria', '$Disco', '$Fonte', '$Torre', '$Nome')";
            $inserir_componentes = mysqli_query($liga, $inserir_componentes_query);

            header("Location: configurador.php");
        }



    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurador</title>
    <link rel="stylesheet" href="configurador.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<script>
            const urlParams = new URLSearchParams(window.location.search);
            const erro = urlParams.get('erro');      
            
            if(erro){
            alert("O nome desta Configuração ja existe");
        }
</script>    
<body>
    
    <script src="configurador.js"></script>
    <header>
        <a href="logout.php">
            <span class="icone"><i class="bi bi-box-arrow-left"></i></span>
        </a>
        <h1>Configurador</h1>
        <div class="userContainner">
            <span class="UserIcon"><i class="bi bi-person-circle"></i></span>
            <?php echo "<h2 class='sessao'>$Nome</h2>"; ?>
        </div>
        
    </header>
        
        <nav class="side-bar" side-bar>
            <ul>
                <li class="menu-item">
                    <a href="configurador.php">
                        <span class="icon"><i class="bi bi-house"></i></span>
                        <span class="txt-link">Home</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="eliminar.php">
                        <span class="icon"><i class="bi bi-trash"></i></span>
                        <span class="txt-link">Eliminar</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pesquisar.php">
                        <span class="icon"><i class="bi bi-search"></i></span>
                        <span class="txt-link">Pesquisar</span>
                    </a>
                </li>
                
            </ul>
        </nav>   
    
 <script>
    function validarnome(){
        var nameConf = document.getElementById("nomeConf").value.trim();
        if(nameConf === "" ){
            alert("preecha todos os campos")
            return false;
        }
        return true;
    }
 </script>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validarnome()">
    <div class="containner">
        <div class="componente">
            <h2>Processador</h2>
            <select id="processador" value = "" name="Processador" id="Processador">
                <option value="Intel core i3 12100">Intel core i3 12100</option>
                <option value="Intel core i5 12400">Intel core i5 12400</option>
                <option value="Intel core i5 12600K">Intel core i5 12600KF</option>
                <option value="Intel core i7 12700">Intel core i7 12700</option>
                <option value="Intel core i7 12700K">Intel core i7 12700K</option>
                <option value="Intel Core i9-12900K">Intel Core i9-12900K</option>
            </select>
        </div>
        <div class="componente">
            <h2>Placa mãe</h2>
            <select name="Placa_mae"id="placa_mae">
                <option value="B660">B660</option>
                <option value="B760">B760</option>
                <option value="Z690">Z690</option>
                <option value="Z790">Z790</option>
            </select>
        </div>
        <div class="componente">
            <h2>Placa de video</h2>
            <select name="Placa_video" id="placa_video">
                <option value="Nvidia RTX 3050" data-valor="500">Nvidia RTX 3050</option>
                <option value="Nvidia RTX 3060" data-valor="600">Nvidia RTX 3060</option>
                <option value="Nvidia RTX 3070" data-valor="650">Nvidia RTX 3070</option>
                <option value="Nvidia RTX 3080" data-valor="750">Nvidia RTX 3080</option>
                <option value="Nvidia RTX 4060" data-valor="550">Nvidia RTX 4060</option>
                <option value="Nvidia RTX 4070" data-valor="650">Nvidia RTX 4070</option>
                <option value="Nvidia RTX 4080" data-valor="750">Nvidia RTX 4080</option>
                <option value="Radeon RX 6600" data-valor="550">Radeon RX 6600</option>
                <option value="Radeon RX 6700 XT" data-valor="650">Radeon RX 6700 XT</option>
                <option value="Radeon RX 6800 XT" data-valor="750">Radeon RX 6800 XT</option>
                <option value="Radeon RX 7600" data-valor="550">Radeon RX 7600</option>
                <option value="Radeon RX 7700 XT" data-valor="650">Radeon RX 7700 XT</option>
                <option value="Radeon RX 7800 XT" data-valor="650">Radeon RX 7800 XT</option>
            </select>
                            
            </select>
        </div>
        <div class="componente">
            <h2>Memoria</h2>
            <select name="Memoria" id="memoria">
                <option value="8GB DDR5 4800MHz">8GB DDR5 4800MHz</option>     
                <option value="16GB DDR5 5200MHz">16GB (8 x 2) DDR5 5200MHz</option>
                <option value="16GB DDR5 6000MHz">16GB (8 x 2) DDR5 6000MHz</option>
                <option value="32GB DDR5 5200MHz">32GB (16 x 2) DDR5 5200MHz</option>
                <option value="32GB DDR5 6000MHz">32GB (16 x 2)DDR5 6000MHz</option>
                                
            </select>
        </div class="componente">
        <div class="componente">
            <h2>Disco</h2>
            <select name="Disco" id="disco">
                <option value="240GB SSD">240GB SSD</option>     
                <option value="480 GB SSD">480 GB SSD</option>
                <option value="1TB SSD">1TB SSD</option>
                <option value="2TB SSD">2TB SSD</option>
                <option value="4TB SSD">4TB SSD</option>
            </select>
        </div>
        <div class="componente">
            <h2>Fonte</h2>
            <select name="Fonte" id="fonte">
                <option value="500w 80+ Bronze" data-valor2="500">500w 80+ Bronze</option> 
                <option value="650w 80+ Bronze"data-valor2="650">650w 80+ Bronze</option> 
                <option value="750w 80+ Bronze"data-valor2="750">750w 80+ Bronze</option>
                <option value="850w 80+ Bronze"data-valor2="850">850w 80+ Bronze</option>
                <option value="1000w 80+ Bronze"data-valor2="1000">1000w 80+ Bronze</option>
                <option value="650w 80+ Gold"data-valor2="650">650w 80+ Gold</option>
                <option value="750w 80+ Gold"data-valor2="750">750w 80+ Gold</option>
                <option value="850w 80+ Gold"data-valor2="850">850w 80+ Gold</option>
                <option value="1000w 80+ Gold"data-valor2="1000">1000w 80+ Gold</option>   
            </select>
        </div>
        <div class="componente">
            <h2>Torre</h2>
            <select name="Torre" id="torre">
                <option value="MSI MAG Forge">MSI MAG Forge</option> 
                <option value="Corsair iCUE 4000X RGB">Corsair iCUE 4000X RGB</option>
                <option value="Corsair 5000D Airflow">Corsair 5000D Airflow</option>
                <option value="Tempest Shade RGB">Tempest Shade RGB</option>
                <option value="Nfortec Dys ARGB">Nfortec Dys ARGB</option>
            </select>   
        </div>
        
    </div>
    <input type="text"  name="ID" id="nomeConf" class="txt" placeholder="Nome da Configuração" required>
    <div class="butoes">
        <button type="submit"  value="Configurar">Configurar</button>
    </div>
    
   
</form>


   <div class="tabela">
    <iframe src="listar.php" width="100%" height="100%" frameborder="0"></iframe>
   </div>

   
   
</body>
</html>

