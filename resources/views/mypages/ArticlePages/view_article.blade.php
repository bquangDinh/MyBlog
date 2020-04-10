@extends('admin')

@section('title')
View Article
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/view_article.css') }}">
@endsection

@section('main-content')
<div class="table-container">
    <table id="viewing-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <colgroup>
            <col style="width:40%">
            <col style="width:10%">
            <col style="width:20%">
            <col style="width:30%">
        </colgroup>  
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->type->name }}</td>
                <td>{{ $article->formattedCreatedAt() }}</td>
                <td class="status" data-status="{{ $article->state->current_state }}">{{ $article->state->current_state }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/mypages/view_article.js') }}"></script>
@endsection