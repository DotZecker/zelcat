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


    /**
     * Afegeix valors al objecte
     * @param String $taula   Nom de la taula a treballar
     * @param Array  $selects Quins camps es vol retornar
     */
    public function __construct($taula, $selects = null)
    {
        $this->taula   = $taula;
        $this->selects = $selects;
    }


    /**
     * Crita al objecte
     * @param  String $nomTaula
     * @param  array  $selects
     * @return Fluid
     */
    public static function taula($nomTaula, $selects = null)
    {
        return new Fluid($nomTaula, $selects);
    }


    /**
     * Fa un WHERE $clau $operacio $valor
     * @param  $clau
     * @param  $operacio
     * @param  $valor
     * @return Fluid
     */
    public function on($clau, $operacio, $valor)
    {
        // Afegim les cometes si no es un nombre
        if (! is_numeric($valor)) $valor = afegirCometes($valor);

        $this->wheres[] = array('clau' => $clau, 'operacio' => $operacio, 'valor' => $valor);

        return $this;
    }


    /**
     * Fa un $tipus JOIN $taula ON $clau = $valor
     * @param  $taula
     * @param  $clau
     * @param  $valor
     * @param  $tipus
     * @return Fluid
     */
    public function join($taula, $clau, $valor, $tipus = '')
    {
        $this->joins[] = array('taula' => $taula, 'clau' => $clau, 'valor' => $valor, 'tipus' => $tipus);

        return $this;
    }


    /**
     * Fa un GROUP BY $que[0], $que[1], ...
     * @param  $que [description]
     * @return Fluid
     */
    public function groupBy($que)
    {
        if (! is_array($que)) $que = array($que);

        $this->groupBy = $que;

        return $this;
    }


    /**
     * Fa un LIMIT $aPartir (, $quants)
     * @param  $aPartir
     * @param  $quants
     * @return Fluid
     */
    public function agafa($aPartir, $quants = null)
    {
        if (! is_null($quants)) $aPartir .= ", $quants";

        $this->limit = $aPartir;

        return $this;
    }


    /**
     * Fa un ORDER BY $que[0], $que[1], ... $metode
     * @param  $que
     * @param  $metode
     * @return Fluid
     */
    public function orderBy($que, $metode = null)
    {
        if (! is_array($que)) $que = array($que);

        $this->orderBy['que'] = $que;
        if (! is_null($metode)) $this->orderBy['metode'] = $metode;

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

        return BD::cru($this->consulta);
    }


    /**
     * Retorna el primer valor de executar la consulta
     * @param  int    $id
     * @param  array  $que Selects a retornar
     * @return array  Resultat de la consulta
     */
    public function primer($id = null, $que = array())
    {
        return (isset($this->obtenir($id, $que)[0]))
               ? $this->obtenir($id, $que)[0]
               : false;
    }


    /**
     * Tan sols retorna el camp passat per paràmetre
     * @param  String $que Paràmetre a reblre
     * @return Mix
     */
    public function tanSols($que)
    {
        return $this->primer()[$que];
    }


    /**
     * Retorna tots els resultats
     * @param  Array $que Selects
     * @return Array      Resultat d'executar la consulta
     */
    public function tots($que = null)
    {
        return $this->obtenir($que);
    }


    /**
     * Métode magin que fa magia amb la consulta
     * EXEMPLE DEL QUE ENS PODEN PASSAR:
     *     * ->on_comunitatautonoma_id_i_abreviatura(1, 'UMA');
     *
     * @param  String $metode
     * @param  Array  $parametres
     * @return Array  Resultat de la consulta
     */
    public function __call($metode, $parametres)
    {
        // Si comença amb on_
        if (strpos($metode, 'on_') !== false) {

            // Li treiem el on
            $metode = substr($metode, 3);

            $filtres = explode('_i_', $metode);

            $count = 0;
            foreach ($filtres as $filtre) {

                $this->on($filtre, '=', $parametres[$count]);

                $count++;
            }

            return $this;

        }

    }

}