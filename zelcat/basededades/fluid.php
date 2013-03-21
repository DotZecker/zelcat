<?php

class Fluid
{

    protected $taula;
    protected $selects = null;
    protected $wheres  = array();
    protected $joins   = array();
    protected $groupBy = array();
    protected $orderBy = array('que' => array(), 'metode' => 'DESC');
    protected $limit   = null;


    protected $consulta;

    public function __construct($taula, $selects = null)
    {
        $this->taula   = $taula;
        $this->selects = $selects;
    }

    public static function taula($nomTaula, $selects = null)
    {
        return new Fluid($nomTaula, $selects);
    }

    public function on($clau, $operacio, $valor)
    {
        // Afegim les cometes si no es un nombre
        if (! is_numeric($valor)) $valor = $this->afegirCometes($valor);

        $this->wheres[] = array('clau' => $clau, 'operacio' => $operacio, 'valor' => $valor);

        return $this;
    }

    /**
     * Monta la consulta i la executa
     * @param  int $id   Si es vol filtrar per id
     * @return array     Consulta executada
     */
    public function obtenir($id = null, $que = array())
    {
        if (! is_null($id)) {
            if (! is_array($id)) {
                $this->on('id', '=', $id);
            } else {
                $que = $id;
            }
        }

        if (count($que) > 0) $this->selects = $que;


        // SELECT
        $this->consulta = 'SELECT ';

        $this->consulta .= (is_null($this->selects)) ? '* ' . "\n" : "\n\t" . implode(",\n\t", $this->selects) . "\n";

        // FROM
        $this->consulta .= 'FROM ' . $this->taula . "\n";

        // INNER JOIN
        foreach ($this->joins as $join) {
            $this->consulta .= "\tINNER JOIN {$join['taula']} ON {$join['clau']} = {$join['valor']}\n";
        }


        // WHERE
        $whereUsat = false;
        foreach ($this->wheres as $valor) {


            $this->consulta .= ($whereUsat) ? "\t" . 'AND ' : 'WHERE ';
            $this->consulta .= "{$valor['clau']} {$valor['operacio']} {$valor['valor']} \n";

            $whereUsat = true;
        }

        // GROUP BY
        if (count($this->groupBy) > 0)
            $this->consulta .= 'GROUP BY ' . implode(', ', $this->groupBy) . "\n";

        // ORDER BY
        if (count($this->orderBy['que']) > 0)
            $this->consulta .= 'ORDER BY ' . implode(', ', $this->orderBy['que']) . " {$this->orderBy['metode']} \n";

        // LIMIT
        if (! is_null($this->limit)) $this->consulta .= "LIMIT {$this->limit}";

        pd($this->consulta);
        return BD::cru($this->consulta);
    }

    public function join($taula, $clau, $valor)
    {
        $this->joins[] = array('taula' => $taula, 'clau' => $clau, 'valor' => $valor);

        return $this;
    }

    public function groupBy($que)
    {
        if (! is_array($que)) $que = array($que);

        $this->groupBy = $que;

        return $this;
    }

    public function agafa($aPartir, $quants = null)
    {
        if (! is_null($quants)) $aPartir .= ", $quants";

        $this->limit = $aPartir;

        return $this;
    }

    public function orderBy($que, $metode = null)
    {
        if (! is_array($que)) $que = array($que);

        $this->orderBy['que'] = $que;
        if (! is_null($metode)) $this->orderBy['metode'] = $metode;

        return $this;
    }

    public function primer($id = null, $que = array())
    {
        return (isset($this->obtenir($id, $que)[0]))
               ? $this->obtenir($id, $que)[0]
               : false;
    }

    public function tanSols($que)
    {
        return $this->primer()[$que];
    }




    protected function afegirCometes($on) {

        return '"' . $on .'"';
    }

    protected function primerValor($que) {
        return explode(' ', $que)[0];
    }
}