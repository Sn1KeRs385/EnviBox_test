<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\FeedbackSaver\FeedbackSaver;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        return view('Feedback.index')->with(["SaverTypes" => FeedbackSaver::SaverType]);
    }

    public function Add(Request $request){
        $Feedback = Feedback::create($request->Feedback);
        $FeedbackSave = FeedbackSaver::GetSaver($Feedback, $request->SaverType);
        $FeedbackSave->save();
        return json_encode($FeedbackSave->GetMessage());
    }
}
