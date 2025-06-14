<?php

namespace App\Models;

class Tarefa
{
    public $uuidTarefa;
    public $tituloTarefa;
    public $descricaoTarefa;
    public $statusTarefa;
    public $dataVencimento;
    public $tagsTarefa;

    public function __construct($uuidTarefa, $tituloTarefa, $descricaoTarefa, $statusTarefa, $dataVencimento, $tagsTarefa)
    {
        $this->uuidTarefa = $uuidTarefa;
        $this->tituloTarefa = $tituloTarefa;
        $this->descricaoTarefa = $descricaoTarefa;
        $this->statusTarefa = $statusTarefa;
        $this->dataVencimento = $dataVencimento;
        $this->tagsTarefa = $tagsTarefa;
    }
}
