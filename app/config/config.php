<?php
return new \Phalcon\Config(array(
    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'vagrant',
        'password' => 'vagrant',
        'dbname' => 'vagrant'
    ),
    'application' => array(
        'controllersDir' => APP_DIR . '/controllers/',
        'modelsDir' => APP_DIR . '/models/',
        'formsDir' => APP_DIR . '/forms/',
        'viewsDir' => APP_DIR . '/views/',
        'libraryDir' => APP_DIR . '/library/',
        'pluginsDir' => APP_DIR . '/plugins/',
        'cacheDir' => STORAGE_DIR . '/cache/',
        'viewsCacheDir' => STORAGE_DIR . '/views/',
        'metaDataDir' => STORAGE_DIR . '/metadata/',
        'baseUri' => '/',
        'publicUrl' => 'phalcon.dev',
        'cryptSalt' => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    )
));