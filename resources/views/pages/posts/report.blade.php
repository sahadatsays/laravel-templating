@extends('layout')

@section('title', 'Posts Report')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Post Report </h2>
               <h3>Yearly Posts</h3>
               <ul>

                @foreach ($yearly as $item)
                    <li>Year: {{ $item->year }}. Number of Posts: {{ $item->total }}</li>
                @endforeach
               </ul>

               <h4>Total Posts: {{ $yearly->sum('total') }}</h4>

               <h3>Monthly Report for {{ $year }}</h3>
               <ul>
                @foreach ($monthly as $item)
                    <li>{{ $item->month }} : {{ $item->total }}</li>
                @endforeach
               </ul>
            </div>
        </div>
    </div>
@endsection
