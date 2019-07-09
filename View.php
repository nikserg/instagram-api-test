<?php

/**
 * Вспомогательные функции отображения
 *
 *
 */
class View {

    /**
     * Рендер шаблона из папки templates
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

    /**
     * Человекопонятное отображение Инстаграм-даты
     *
     *
     * @param $timestamp
     * @return false|string
     */
    public static function renderTimestamp($timestamp)
    {
        return date('d.m.Y H:i:s', substr($timestamp, 0, -6));
    }

}