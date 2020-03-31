@extends('admin')

@section('title')
View Article
@endsection
<link rel="stylesheet" href="{{ URL::asset('css/mypages/view_article.css') }}">
@section('css')

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
            <tr>
                <td>Go to the Moon !</td>
                <td>Note</td>
                <td>June 7, 2020</td>
                <td class="status" data-status="saved">Saved</td>
            </tr>
            <tr>
                <td>Hey what's up? !</td>
                <td>Diary</td>
                <td>June 9, 2020</td>
                <td class="status" data-status="published">Published</td>
            </tr>
            <tr>
                <td>Minecraft demo !</td>
                <td>Note</td>
                <td>June 20, 2020</td>
                <td class="status" data-status="hided">Hided</td>
            </tr>
            
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/mypages/view_article.js') }}"></script>
@endsection