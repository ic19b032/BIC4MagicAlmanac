@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <kind :current-kind="{{ $kind }}"></kind>
        </div>
    </section>
@endsection
