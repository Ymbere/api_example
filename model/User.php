<?php

/**
 * Requere o arquivo de conexão para que ele possa
 * ser estendido pela classe User.
 * Neste arquivo é feita toda parte de get, set, delete, etc
 * do usuario
 * 
 * @category Arquido_Modelo_De_Usuario
 * @package  Model
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #
 */

require '../conexao/Conexao.php';

/**
 * Classe usuario esta classe estende de conexão
 * possuindo tudo da classe conexão
 * Esta classe é responsave pelos metodos get,set,delete,etc
 * de usuario
 * 
 * @category Classe_De_Usuario
 * @package  Model
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #
 */

class User extends Conexao
{
    private $_Id;
    private $_Nickname;
    private $_Name;
    private $_Password;
    private $_Email;
    private $_Thumbnail;
    
     
    /**
     * Função de inserção no banco do objeto usuario,
     * esta função pega o $obj que é um json ja parceado
     * pega a string que banco que é estatica
     * realiza o bind dos valores do objeto com o do json,
     * executa o sql
     * 
     * @param json $obj um objeto json do usuario
     * 
     * @return exception retorna o erro do sql se tiver
     */
    public function insert($obj)
    {
        $sql = "INSERT INTO user(Id, Nickname, Name, Password, Email, Thumbnail) VALUES (:id, :nickname, :name, :password, :email, :thumbnail)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $obj->id);
        $consulta->bindValue('nickname', $obj->nickname);
        $consulta->bindValue('name', $obj->name);
        $consulta->bindValue('password', $obj->password);
        $consulta->bindValue('email', $obj->email);
        $consulta->bindValue('thumbnail', $obj->thumbnail);
        return $consulta->execute();
    }
}