<?php

namespace app\libraries;

class Model
{
    protected Database $db;
    protected string $table = '';

    public function __construct()
    {
        $this->db = new Database();
    }
}