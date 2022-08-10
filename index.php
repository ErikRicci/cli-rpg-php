<?php

use App\Main;
use App\Models\Character;
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require_once 'helpers.php';

$envs = parse_ini_file('.env');

$db = new DB;

// TODO: Add choice of DB connection (only sqlite for now)
$db->addConnection([
    'driver' => $envs['driver'],
    'database' => $envs['database'],
    'prefix' => $envs['prefix'],
    'foreign_key_constraints' => $envs['foreign_key_constraints'],
]);

$db->setAsGlobal();
$db->bootEloquent();

/**
 * Currently defines the size of the game's ascii
 * frame characters width. Pure aesthetic fyi.
 */
define('MAX_WIDTH', 80);

/**
 * Stores character/user currently logged in
 */
$GLOBALS['character'] = new Character();

(new Main())->run();
