<?php

class Connection
{

    protected $conn;
    private $configFile = "conf.json";

    private static $instance = null;

    private function __construct()
    {
        $this->makeConnection();
    }

    public static function getInstance()
    {

        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function makeConnection()
    {

        $confiData = file_get_contents($this->configFile);
        $array = json_decode($confiData, true);
        $dsn = "mysql:host=" . $array['host'] . ";dbname=" . $array['db'];
        $this->conn = new PDO($dsn, $array["userName"], $array["password"]);
    }

    
    public function __destruct()
    {
        $this->conn=null;
    }
}
