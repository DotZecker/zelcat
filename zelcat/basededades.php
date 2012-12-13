<?php

class BaseDeDades {

	public $configuracio;
    protected $db;

	public function __construct()
	{
        $config = Configuracio::de('basededades');
		$this->configuracio = $config;

        // Connectem
        $this->db = new PDO("{$config['driver']}:host={$config['host']};dbname={$config['basededades']};charset={$config['charset']}", $config['usuari'], $config['contrasenya']);
		//pd($this->configuracio);
	}

    public static function cru($consulta)
    {
        $connexio = new static();
        // TODO: Control de errores
        return $connexio->db->query($consulta)->fetchAll(PDO::FETCH_ASSOC);

    }


}