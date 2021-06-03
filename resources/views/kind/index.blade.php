@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <kinds :all-kinds="{{ $kinds->load('spells') }}"></kinds>
{{--            <kinds :all-kinds="{{ $kinds->load('spell') }}"></kinds>--}}
            <kinds :all-kinds="{{ $kinds }}"></kinds>
        </div>
    </section>
@endsection
