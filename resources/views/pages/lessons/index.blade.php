@extends('layouts.app')

@section('title')
    {{ $lesson->title }}
@endsection

@section('css')
<style>
    @media only screen and (max-width: 600px) {
        .display-content{
            display: none;
        }
    }

    @media only screen and (min-width: 601px) {
        .display-content-mobile{
            display: none;
        }
    }
    .overlay-dark {
        background: rgba(0, 0, 0, 0.8);
    }
    .bg-card-black{
        background-color: #222222;
    }
</style>
@endsection

@section('content')
    @if($user->status == 'active')
        <div class="row">
            <div class="col-md-12 display-content" style="background-color: #171717;">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe src="{{ $lesson->link_video }}" class="embed-responsive-item" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-12 display-content-mobile" style="background-color: #171717;">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe src="{{ $lesson->link_video }}" class="embed-responsive-item" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-12 px-4">
                <div class="row">
                    <div class="col-md-12 mt-4 display-content">
                        <h4 class="text-light">{{ $lesson->title }}</h4>
                        @if($course->level == 'advanced')
                            <span class="badge badge-danger">Advanced</span>
                        @endif

                        @if($course->level == 'basic')
                            <span class="badge badge-primary">Basic</span>
                        @endif
                        
                        <p style="color: #CDCCCC" class="mb-5 mt-3">
                            {{ $course->description }}
                        </p>
                        <hr class="bg-dark">
                    </div>
                    

                    <div class="col-md-6 mb-3 mt-4">
                        <h2 class="text-light">LIST LESSONS</h2>
                        @foreach($lessons as $value)
                            <h4 class="pt-4">
                                <a href="{{ url('lesson') }}/{{ $value->lesson_id }}" class="text-decoration-none @if($lesson->lesson_id == $value->lesson_id) text-warning @else text-light @endif font-weight-light"><i class="fas fa-play-circle"></i> {{ $value->title }}</a>
                            </h4>
                            <span class="text-light font-weight-lighter" style="font-size: 16px;"> <b>Duration</b> : {{ $value->duration }} Minutes</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')

@endsection