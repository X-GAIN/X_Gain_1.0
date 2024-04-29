<?php

    function Conectar() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "x_bank";
    
        // Criando a conexão
        $conn = new mysqli($servername, $username, $password, $database);
    
        // Verificando a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        
        return $conn;
    }
    
    function Desconectar($conn) {
        // Fechando a conexão
        $conn->close();
    }

?>