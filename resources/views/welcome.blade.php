@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Welcome
            </div>

            <div class="links">
                <a href="{{route('Feedback.index')}}")>Оставьте отзыв о главной странице</a>
            </div>
        </div>
    </div>
@endsection
