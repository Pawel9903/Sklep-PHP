<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 29.04.2018
 * Time: 17:25
 */

class Db
{
    static $instance;

    public static function getInstance()
    {
        return self::$instance = new Db();
    }

    public function getPdo()
    {
            $parameters = Config::getInstance()->getConfig();
            $pdo = new PDO(
                'mysql:
                host= '.$parameters->getHost().';
                dbname='.$parameters->getDbName().';
                charset='.$parameters->getCharset().';
                host='.$parameters->getHost(),
                $parameters->getUser(),
                $parameters->getPassword());

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
    }
}