<?php

class Configuracion {

    public $dataBase;
    public $host;
    public $user;
    public $password;

    public function __construct() {
        $this->dataBase = 'demo_capacitaciones';
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
	}
	
}
