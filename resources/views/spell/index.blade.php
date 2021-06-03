@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
{{--            <spells :all-spells="{{ $spells->load('kind') }}"></spells>--}}
            <spells :all-spells="{{ $spells->load('kind') }}"></spells>
        </div>
    </section>
@endsection
