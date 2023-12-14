<?php

namespace models;

require_once __DIR__ . '/../dataaccess/db/DBConnector.php';

use \DataAccess\DB\DBConnector;

class BaseModel extends DBConnector
{
    function __construct()
    {
    }
}
