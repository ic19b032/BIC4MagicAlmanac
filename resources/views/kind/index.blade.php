@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <kinds :all-kinds="{{ $kinds }}"></kinds>
        </div>
    </section>
@endsection
