<?php

namespace Source\Models;

class Header extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("header", ["id"], ["name"]);
    }

}