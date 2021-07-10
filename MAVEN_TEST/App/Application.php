<?php
namespace MavenTest\Application;


/**
 * Класс для объекта нашего приложения
 * Реализует класический Singleton (один объект на всё)
 * 
 */

class Application {
    
    private static $instances = [];

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("BOOO!");
    }

    public static function Run(): Application
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    public function Controller() {

            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($page) {
                case 'value':
                    # code...
                    break;
                
                default:

                    include 'pages/home.php'; 

                    break;
            }

    }
}



$testApp = Application::Run("TEST APPLICATION \n");

$testApp->Controller();
