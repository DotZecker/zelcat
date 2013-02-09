<?php

class BaseDeDades {

	public $configuracio;
    protected $pdo;

    /**
     * Instanciem una nova base de dades
     */
	public function __construct()
	{
        $config = Configuracio::de('basededades');
		$this->configuracio = $config;

        // Connectem
        $this->pdo = new PDO("{$config['driver']}:host={$config['host']};dbname={$config['basededades']};charset={$config['charset']}", $config['usuari'], $config['contrasenya'], array(PDO::ATTR_PERSISTENT => true));
	}

    /**
     * Executa una sentencia SQL
     * @param  String $consulta El sql a executar
     * @return array            El resultat de executar el SQL
     */
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