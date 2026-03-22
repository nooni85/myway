<?php
// migrations-db.php

use EdenProject\MyWay\Config\Config;

$config = new Config("database");

$development = $config->get("development");

return $development;
