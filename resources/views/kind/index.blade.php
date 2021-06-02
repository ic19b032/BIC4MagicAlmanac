@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <kind :all-kinds="{{ $kinds }}"></kind>
        </div>
    </section>
@endsection
