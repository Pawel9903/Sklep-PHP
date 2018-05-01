<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 29.04.2018
 * Time: 17:25
 */

class Config
{
    private $host = 'localhost';
    private $dbName = 'shop';
    private $user = 'root';
    private $charset = 'utf8';
    private $password = '';

    static $instance;

    public static function getInstance()
    {
        return self::$instance = new Config();
    }

    public function getConfig()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        return $this->dbName;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }
}