@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <spell-form :is-editable="true" :current-spell="{{ $spell }}"></spell-form>
        </div>
    </section>
@endsection
