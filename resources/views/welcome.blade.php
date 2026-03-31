@extends('layouts.welcome')

@section('title', 'Accueil | Organisation du Bien-Être Communautaire | ABEC International')
@section('meta_description', 'ABEC International - Une organisation internationale de jeunes engagés pour le bien-être communautaire : santé, éducation, environnement, droits humains.')

@push('styles')
    @include('partials.home.styles')
@endpush

@section('content')
    @include('partials.home.modal')
    @include('partials.home.hero-carousel')
    @include('partials.home.actions')
    @include('partials.home.about-teaser')
    @include('partials.home.partners')
@endsection

@push('scripts')
    @include('partials.home.scripts')
@endpush