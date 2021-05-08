@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <spell :current-spell="{{ $spell }}"></spell>
        </div>
    </section>
@endsection
