@extends('container.frame')
<link href="/public/css/home.css" rel="stylesheet">
@section('page')
    @foreach($events as $event)
    <div class="event col-md-2" data-id="{{ $event->id }}">
        <div class="col-md-12" style="text-align:center;">
            <label class="event-title">{{ $event->event_name }}</label>
        </div>
        <div class="col-md-12" style="text-align:center;">
            <img class="event-thumb" src="{{ asset('storage/music.png') }}">
        </div>
        <div class="col-md-12" style="text-align:center;">
            <div class="description">
                {{ $event->address }}
            </div>
        </div>
        <div class="col-md-12" style="text-align:center;">
            <div class="description">
                {{ $event->city }}, {{ $event->state . ' ' . $event->zipcode }}
            </div>
        </div>
    </div>
    @endforeach
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('.event').click(function() {
                window.location.href='<?php echo asset('event') ?>/' + $(this).data('id');
            });
        });
    </script>
@endsection