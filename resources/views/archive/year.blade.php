@extends('layouts.app')

@section('content')
    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Archive {{request()->route('year')}}</h1>
            </div>
        </div>
        @foreach($years as $year)
        <div class="row my-2">
            <div class="col-12">
                <a href="{{url('pdf/'.$year->url)}}" role="button" target="_blank" class="card p-3">
                    {{$year->name}}
                </a>
            </div>
        </div>
       @endforeach
    </div>
@endsection