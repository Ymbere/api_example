<?php

/**
 * Classe que chama galera pra fazer o inser,
 * isso fica desacoplado do front end,
 * O front ira mandar só o Json que a variavel
 * $data pega, no caso do exemplo ele pega
 * do arquivo test.json
 * 
 * @category Arquivo_De_View
 * @package  View
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #
 */ 
require '../control/UserControl.php';

/**
 * Aqui é onde rola a inserção da parada
 * ele pega as informações de JSon que no caso
 * ta estatico mas na real quem vai manda é o front
 * ele pega salve o Json, depois decodifica,
 * dai se o cara não for vazio ele chama o user control
 * que ele requeriu no começo do arquivo,
 * intancia o user control e chama o insert passando o 
 * json decodificado
 */

$data = file_get_contents('../teste.json');
$obj = json_decode($data);

if (!empty($data) ) {
    $userControl = new UserControl();
    $userControl->insert($obj);
    header('Location:listar.php');
}