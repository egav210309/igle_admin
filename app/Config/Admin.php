<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Admin extends BaseConfig
{
    public $defaultGroupUsers  = 'usuario';
    public $defaultEstadUsers  = 'pendiente';
    public $regPerPage  = 10;

}