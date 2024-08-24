@extends('layouts.layout')
@section('content')
    <div class="container py-4">
        <div class="row">
            @include('shared.left_sidebar')
            <div class="col-6">
                @include('shared.delete_message')
                @include('shared.succcess_message')
                @include('shared.idea_card')
            </div>
            <div class="col-3">
                @include('shared.search_bar')
                @include('shared.follow_box')
            </div>
        </div>
    @endsection
