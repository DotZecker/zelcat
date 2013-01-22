<?php

class BaseDeDades {

	public $configuracio;
    protected $pdo;

	public function __construct()
	{
        $config = Configuracio::de('basededades');
		$this->configuracio = $config;

        // Connectem
        $this->pdo = new PDO("{$config['driver']}:host={$config['host']};dbname={$config['basededades']};charset={$config['charset']}", $config['usuari'], $config['contrasenya']);
	}

    public static function cru($consulta)
    {
        $connexio = new static();
        // TODO: Control de errores
        $consulta = $connexio->pdo->query($consulta);

        return ($consulta)
               ? $consulta->fetchAll(PDO::FETCH_ASSOC)
               : array();

    }

    public function __destruct()
    {
        $this->pdo = null;
    }


}