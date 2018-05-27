<?php

/**
 * Requere o arquivo User que é um modelo de um objeto
 * do tipo usuario contendo seus metodos get, set, insert etc
 * 
 * @category Arquivo_De_Controle_De_Usuario
 * @package  Control
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #* 
 */
require '../model/User.php';

/**
 * Está uma clase que realiza a parte de controle de usuario
 * ela possui as funções para inserção, deleção, etc
 * 
 * @category Classe_De_Controle_De_Usuario
 * @package  Control
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #
 */
class UserControl
{

    /**
     * Função para que seja realizado o insert de um
     * usuario no banco, ela recebe um objeto do tipo usuario
     * chama o metodo de insert do usuario e passa ele mesmo
     * 
     * @param Json $obj um arquivo Json já parceado
     * 
     * @return Expection retorna o erro do banco caso de
     */
    function insert($obj)
    {
        $user = new User();
        return $user->insert($obj);
        header('Location:listar.php');
    }
}


