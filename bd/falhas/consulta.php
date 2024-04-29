<?php
    session_start()

    final class Consulta extends ConexaoBD
    {
        public Function ConsultaLogin($tabela, $condicao)
        {
            $resultado=$this->conexao->query("select
            *from $tabela $condicao")->fetchAll();
        }
    }
?>