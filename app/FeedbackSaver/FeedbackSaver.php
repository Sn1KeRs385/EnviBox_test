<?php

namespace App\FeedbackSaver;

use App;

abstract class FeedbackSaver
{
    /**
     * Справочная константа, какие виды сохранения доступны
     */
    public const SaverType = [
        ["Name" => "File", "Description" => "Сохранить отзыв в файл"],
        ["Name" => "DB", "Description" => "Сохранить отзыв в базу дынных"],
    ];

    /**
     * Функция возвращает выбранный класс-сохранялку
     * @param $Feedback - модель отзыва
     * @param $SaverType - тип сохранения, типы прописаны в справочнике
     * @return DBFeedbackSaver|FileFeedbackSaver - класс сохранялка
     */
    static function GetSaver($Feedback, $SaverType){
        if($SaverType == "File"){
            return new FileFeedbackSaver($Feedback);
        } elseif($SaveType = "DB"){
            return new DBFeedbackSaver($Feedback);
        }
    }

    /**
     * Переменная для модели Feedback
     * @var App\Feedback
     */
    private $Feedback;

    /**
     * Метод сохраняет отзыв
     * @return void
     */
    abstract public function save();

    /**
     * Метод возвращает сообщение о удачном или неудачном сохоранении
     * @return string
     */
    abstract  public  function GetMessage();
}
