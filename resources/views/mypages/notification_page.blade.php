@extends('admin')

@section('title')
{{ $message->header }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/notification_page.css') }}">
@endsection

@section('main-content')
<div class="w-100" id="message-container">
    <div id="message-header" class="w-75">
        <div class="ml-3 mt-2">
            @if($message->status == "success")
            <i class="fas fa-check-circle message-status__success"></i>
            @elseif($message->status == "warning")
            <i class="fas fa-info-circle message-status__warning"></i>
            @else
            <i class="fas fa-exclamation-circle message-status__error"></i>
            @endif
            <span>{{ $message->header }}</span>
        </div>
    </div>
    @if($message->content != "")
    <div id="message-content" class="mt-3 w-75">
        {{ $message->content }}
    </div>
    @endif
</div>
@endsection

@section('js')
@endsection