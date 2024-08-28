<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="Form">
        <form method="post">
            <label for="=base">Base:</label>
            <input type="number" id="base" name="base" step="0.01"required>

            <label for="altura">Altura:</label>
            <input type="number" id="altura" name="altura" step="0.01"required>

            <button type="submit">Calcular</button>
        </form>
    </div>

    <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $base = isset($_POST['base']) ? trim($_POST['base']) : ''; # ? é o operador ternário em PHP. Ele é uma forma abreviada de um if-else
            $altura = isset($_POST['altura']) ? trim($_POST['altura']) : ''; #  a função trim() é aplicada ao valor de $_POST['base']. trim() remove quaisquer espaços em branco do início e do final do valor.
        
            $valor_limite = 100;
        
            if ($base === false || $altura === false || $base <= 0 || $altura <= 0) {
                echo "<h1>Erro</h1>";
                echo "<p>Por favor, insira valores válidos para base e altura.</p>";
            } else {

                $area = 0.5 * $base * $altura;
                
                $mensagem = $area > $valor_limite 
                    ? "A área do triângulo é maior que $valor_limite." # nesse caso seria um if
                    : "A área do triângulo é menor ou igual a $valor_limite."; # nesse caso seria um else
                    
                echo "<p>A área do triângulo é: " . number_format($area, 2);
                echo "<p>$mensagem</p>";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    
    ?>
    
</body>
</html>