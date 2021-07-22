@extends('layouts.app')

@section('content')

<section class="mt-5 small-screen_padding">
    <livewire:checkout :donor="$donor" />
</section>

@endsection
