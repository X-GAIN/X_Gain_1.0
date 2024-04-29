<?php
/* Interface BD
Responsável por obrigar
as classes que implementarem
ter os métodos e propriedades aqui
presentes */

interface BD{
    public function Conecta($host, $porta,
    $usuario, $senha);
    public function Desconecta();
}
?>