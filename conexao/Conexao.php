<?php

/**
 * Requere o arquivo de configuração
 * que contém as informações do banco de dados
 * sendo assim algo que não precisa ser versionado
 * cada um pode ter uma versão para sua maquina
 * 
 * @category Arquivo_De_Configuração
 * @package  Conexao
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #
 */

require_once 'config.php';

/**
 * Esta é uma classe de configuração
 * com o banco de dados ela, ela possui duas funcões
 * fazer a coxeção com o banco, fazer o prepare de sql
 * 
 * @category Classe_De_Conexão
 * @package  Conexao
 * @author   Display Name <ymbere@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     #
 */

class Conexao
{

    private static $_instance;

    /**
     * Está é uma funcão para que realizar a conexão
     * com o banco, ela pega os parametros do arquivo
     * de configuração que foi requerido e monta a conexão
     * 
     * @return conexao
     */
    public static function getInstance()
    {

        if (!isset(self::$_instance)) {

            try {
                self::$_instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        }

        return self::$_instance;
    }

    /**
     * Aqui é feito o prepare do sql
     * a função recebe um sql bruto, vai até
     * a função getInstance e o prepara
     * 
     * @param string $sql uma string sql que é a query desejada no banco
     * insert, update, etc
     * 
     * @return string retorna o sql que foi preparado
     */
    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }

}

?>