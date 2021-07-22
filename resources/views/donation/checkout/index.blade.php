@extends('layouts.app')

@section('content')

<section class="mt-5 section-two">
    <livewire:checkout :donor="$donor" />
</section>

@endsection
