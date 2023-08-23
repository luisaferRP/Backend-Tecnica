<?php
include '../Model/Redit.php';

class ReditController
{
    private Redit $Redit;

    public function __construct()
    {
        $this->Redit = new Redit();
    }

    public function save($parametros)
    {
        $this->Redit->save($parametros);
    }

    public function find_by_id($id)
    {
        return $this->Redit->find_by_id($id);
    }

    public function getAll()
    {
        return $this->Redit->getAll();
    }
}
