<?php

namespace Source\Models\EuphoriaApp;

use Source\Core\Model;

/**
 * Class AppCategory
 * @package Source\Models\EuphoriaApp
 */
class AppCategory extends Model
{
    /**
     * AppCategory constructor.
     */
    public function __construct()
    {
        parent::__construct("app_categories", ["id"], ["name", "type"]);
    }
}