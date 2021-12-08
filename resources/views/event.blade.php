@extends('container.frame')
<link href="/public/css/event.css" rel="stylesheet">
@section('page')
<div class="event" data-id="{{ $event->id }}">
    <div class="col-md-12" style="text-align:center;">
        <label class="event-title">{{ $event->event_name }}</label>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <img class="event-thumb" src="{{ asset('storage/music.png') }}">
    </div>
    <div class="col-md-12" style="text-align:center;">
        <div class="description">
            {{ $event->description }}
        </div>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <div class="address">
            {{ $event->address }}
        </div>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <div class="address">
        {{ $event->city }}, {{ $event->state . ' ' . $event->zipcode }}
        </div>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <div class="type">
            Music Type: {{ $event->type->name }}
        </div>
    </div>
</div>
@endsection