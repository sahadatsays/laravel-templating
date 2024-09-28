@extends('layout')

@section('title', 'Contact Page')
@section('page-vendor-css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('page-css')
<style>
    p {
        color: blue;
    }
    .active {
        background: red !important;
        color: white !important;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Page</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores voluptate accusamus numquam
                porro? Culpa impedit excepturi fugit, veritatis aut, optio laudantium voluptatum dolor omnis
                officia reiciendis perspiciatis beatae, error eveniet!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis dolores accusantium nulla
                reiciendis dolore ea officiis. Totam qui, officiis modi ipsam optio quidem harum, asperiores
                dolorum, aliquid quibusdam veniam consequatur.</p>
        </div>
    </div>
</div>
@endsection
