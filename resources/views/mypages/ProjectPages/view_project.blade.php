@extends('admin')

@section('title')
Your experiments
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Articles/view_article.css') }}">
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
            @foreach($projects as $project)
            <tr>
                <td>
                    <i class="fab fa-github" style="{{ $project->project_source_file ? 'color: #e74c3c' : ''}}"></i>
                    <i class="fas fa-rocket" style="{{ $project->github_url ? 'color: #e74c3c' : ''}}"></i>
                    <a href="{{ route('edit_project',['id' => $project->id]) }}">
                    {{ $project->title }}
                    </a>
                </td>
                <td>{{ $project->type->name }}</td>
                <td>{{ $project->formattedCreatedAt() }}</td>
                <td class="status" data-status="{{ $project->state->current_state }}">{{ $project->state->current_state }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/mypages/view_article.js') }}"></script>
@endsection