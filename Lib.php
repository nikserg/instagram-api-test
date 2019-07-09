<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

/**
 * Функции для работы с сообщениями из Директа Инстаграма
 *
 *
 */
class Lib {
    /**
     * @var string Логин для Инстаграма
     */
    private static $instagramLogin = 'dropdead_mouse';
    /**
     * @var string Пароль для Инстаграма
     */
    private static $instagramPassword = 'elessar1989';


    /**
     * @var \InstagramAPI\Instagram Инстанс для работы с API Инстаграма
     */
    private static $instagram;
    /**
     * @var \Medoo\Medoo Инстанс библиотеки для работы с БД
     */
    private static $db;


    /**
     * Залогиненный инстанс для работы с API Инстаграма
     *
     *
     * @return \InstagramAPI\Instagram
     */
    public static function instagram()
    {
        if (!self::$instagram) {
            self::$instagram = new \InstagramAPI\Instagram(true, false, [
                'storage'    => 'mysql',
                'dbhost'     => Config::$dbHost,
                'dbname'     => Config::$dbName,
                'dbusername' => Config::$dbLogin,
                'dbpassword' => Config::$dbPassword,
            ]);
            self::$instagram->login(self::$instagramLogin, self::$instagramPassword);
        }
        return self::$instagram;
    }

    /**
     * Библиотека для работы с БД
     *
     *
     * @return \Medoo\Medoo
     */
    public static function db()
    {

        if (!self::$db) {
            self::$db = new Medoo\Medoo([
                'database_type' => 'mysql',
                'database_name' => Config::$dbName,
                'server' => Config::$dbHost,
                'username' => Config::$dbLogin,
                'password' => Config::$dbPassword
            ]);
        }
        return self::$db;
    }

    /**
     * Рендер шаблона
     *
     *
     * @param string $template
     * @param array $data
     */
    public static function render($template, $data = []) {
        $template = 'templates/'.$template;
        extract($data);
        include "templates/layout.php";
    }

}