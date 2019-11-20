@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <feedback-add-component :savertypes="{{json_encode($SaverTypes)}}"></feedback-add-component>
        </div>
    </div>
@endsection