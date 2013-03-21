<?php

class BaseDeDades {

	public $configuracio;
    protected $pdo;
    public static $connexions = array();

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

        return $connexio->executar($consulta);
    }

    public function executar($consulta)
    {
        // TODO: Control de errors
        $consulta = $this->pdo->query($consulta);

        return ($consulta)
               ? $consulta->fetchAll(PDO::FETCH_ASSOC)
               : array();
    }

    public function __destruct()
    {
        $this->pdo = null;
    }


    /**
     * Métode màgic per cridar a clases
     *
     * <code>
     *      // Per exemple per a fer
     *      $users = BD::taula('usuaris')->tots();
     * </code>
     */
    public static function __callStatic($metode, $parametres)
    {
        return call_user_func_array(array('Fluid', $metode), $parametres);
    }

}