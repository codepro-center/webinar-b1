@extends('template')

@section('content')

@include('sections.hero')

@include('sections.about')

@include('sections.skills')

@include('sections.projects')

@include('sections.contacts')

@endsection

@push('js')
<script src="{{ asset('js/app.js') }}"></script>
@endpush