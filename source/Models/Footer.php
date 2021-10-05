<?php

namespace Source\Models;

class Footer extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("footer", ["id"], ["name"]);
    }

}