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
        echo "CONTROLLEER";

            $page = isset($_GET['page']) ? $_GET['page'] : '';

            echo "page is: ";
            var_dump($page);
            
            switch ($page) {
                case 'viewJPEG':
                    include('/modules/import_to_jpeg/importToJpeg.class.php');
                    # code...
                    break;
                
                default:

                    //include 'pages/home.php'; 

                    break;
            }

    }
}



$testApp = Application::Run();

//$testApp->Controller();
