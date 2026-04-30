@extends('layouts.app')

@section('content')
    @include('partials.topbar')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.skills')
    @include('partials.experience')
    @include('partials.projects', ['projects' => $projects])
    @include('partials.education')
    @include('partials.contact')
    @include('partials.footer')
@endsection
