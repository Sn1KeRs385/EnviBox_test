<?php

namespace App\FeedbackSaver;

use App;

class DBFeedbackSaver extends FeedbackSaver
{
    private $Feedback;

    public function __construct($Feedback){
        $this->Feedback = $Feedback;
    }

    public function save(){
        $this->Feedback->save();
    }

    public function GetMessage()
    {
        return ["Message" => "Файл успешно сохранен в базу данных!"];
    }
}
