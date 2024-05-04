<?php

namespace Data;

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;    

class ConnectionFirebase
{

    public $database;
    public $storage;
    public $auth;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount('dothithongminhkl-firebase-adminsdk-t9j4m-c7dc28f492.json')
            ->withDatabaseUri('https://dothithongminhkl-default-rtdb.firebaseio.com/');

        $this->database = $factory->createDatabase();
        $this->storage = $factory->createStorage();
        $this->auth = $factory->createAuth();
    }
}
