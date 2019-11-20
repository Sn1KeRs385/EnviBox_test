<?php

namespace App\FeedbackSaver;

use App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FileFeedbackSaver extends FeedbackSaver
{
    private $Feedback;
    private $FileName;
    protected function __construct($Feedback){
        $this->Feedback = $Feedback;
    }

    public function save(){
        $this->FileName = storage_path() . '\feedback\\' . date('d-m-Y_H-i-s') . '_' . Str::uuid() . '.txt';
        $StringToSave = "Пользователь:\r\n" . $this->Feedback->Name
                        . "\r\n\r\nНомер телефона:\r\n" . $this->Feedback->TelephoneNumber
                        . "\r\n\r\nОтзыв:\r\n" . $this->Feedback->FeedbackText;

        File::put($this->FileName, $StringToSave);

    }

    public function GetMessage()
    {
        return ["Message" => "Файл успешно сохранен на локальный диск сервера!"];
    }
}
