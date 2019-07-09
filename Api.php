<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

/**
 * Функции для получения данных у демона Инстаграма
 *
 *
 * @see IGWorker
 */
class Api {
    /**
     * @var \GuzzleHttp\Client HTTP-клиент
     */
    private static $client;

    /**
     * Получить HTTP-клиент
     *
     *
     * @return \GuzzleHttp\Client
     */
    private static function client() {
        if (!self::$client) {
            self::$client = new \GuzzleHttp\Client();
        }
        return self::$client;
    }

    /**
     * УРЛ для запросов к демону Инстаграма
     *
     *
     * @return string
     */
    private static function baseUrl()
    {
        return Config::$workerListenHost.':'.Config::$workerPort;
    }

    /**
     * Получить список диалогов
     *
     *
     * @return \InstagramAPI\Response\DirectInboxResponse
     */
    public static function getThreads()
    {
        $response = self::client()->request('GET', self::baseUrl().'/threads');
        return new \InstagramAPI\Response\DirectInboxResponse(json_decode($response->getBody(), true));
    }

    /**
     * Получить один диалог
     *
     *
     * @param $threadId
     * @return \InstagramAPI\Response\DirectThreadResponse
     */
    public static function getThread($threadId)
    {
        $response = self::client()->request('GET', self::baseUrl().'/thread?id='.$threadId);
        return new \InstagramAPI\Response\DirectThreadResponse(json_decode($response->getBody(), true));
    }
}