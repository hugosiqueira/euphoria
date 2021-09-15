<?php

namespace Source\Models;

class Widget extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("widgets", ["id"], ["name", "status"]);
    }

    /**
     * @param string $name
     * @param integer $status
     * @return Widget
     */
    public function bootstrap(
        string $name,
        int $status

    ): Widget {
        $this->name = $name;
        $this->status = $status;
        return $this;
    }

}