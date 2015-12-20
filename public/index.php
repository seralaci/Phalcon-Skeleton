<?php
/**
 * @author László Séra <laszlo.sera@gmail.com>
 */

error_reporting(E_ALL);

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

define('APPLICATION_PATH', dirname(dirname(__FILE__)) . '/app');
define('PUBLIC_PATH', dirname(__FILE__));
define('APPLICATION_ENV', getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development');

require_once APPLICATION_PATH . "/../vendor/autoload.php";

try {
    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');
    if (is_readable(APP_PATH . 'app/config/config.ini.dev')) {
        $override = new ConfigIni(APP_PATH . 'app/config/config.ini.dev');
        $config->merge($override);
    }

    /**
     * Auto-loader configuration
     */
    require APP_PATH . 'app/config/loader.php';

    /**
     * Load application services
     */
    require APP_PATH . 'app/config/services.php';

    $application = new Application($di);

    echo $application->handle()->getContent();
} catch (Exception $e){
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}