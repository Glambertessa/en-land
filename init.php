<?php
define("ROOT_DIR", __DIR__);
define("CONFIG_DIR", __DIR__ . '/config');
define("ROUTING_DIR", __DIR__ . '/routing');
define("WORKSPACE_DIR", __DIR__ . '/workspace');
define("RESOURCES_DIR", __DIR__ . '/resources');
define("CORE_DIR", __DIR__ . '/core');

require_once __DIR__ . '/core/smarty/Autoloader.php';
include __DIR__ . '/core/smarty/bootstrap.php';