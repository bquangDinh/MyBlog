@extends('retro.layouts.retro_main_layout')

@section('meta')

@endsection

@section('title')
Experiments
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/retro/experiments.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<div class="mt-5 experiments-container">
    <div class="row">
        @foreach($experiments as $experiment)
        <div class="col-lg-3 col-md-6 col-12 mb-5">
            <div class="experiment-container w-100 retro-border">
                <div class="title text-font px-3 py-2">
                    {{ $experiment->title }}
                </div>
                <div class="cover mx-2 my-2">
                    @if($experiment->cover_id != null)
                    <img class="w-100 h-100 retro-border" src="{{ $experiment->cover->url }}" alt="experiment preview">
                    @endif
                </div>
                <div class="mt-2 row no-gutters">
                    <div class="col-8">
                        @if($experiment->project_source_file != null)
                        <a target="_blank" href="{{ route('launch_experiment',['id' => $experiment->id]) }}" class="btn w-100 launch-btn launchable text-font retro-border">
                            Launch
                        </a>
                        @else
                            <a href="#" class="btn w-100 launch-btn unlaunchable text-font retro-border">
                                Not for launching
                            </a>
                        @endif
                    </div>
                    <div class="col-4">
                        <a href="{{ route('read_experiment',['id' => $experiment->id]) }}" class="btn w-100 read-btn text-font retro-border">
                            Read
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('js')

@endsection
