@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <kind-form :is-editable="true" :current-kind="{{$kind}}"></kind-form>
        </div>
    </section>
@endsection
