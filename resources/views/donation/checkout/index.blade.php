@extends('layouts.app')

@section('content')

<section class="mt-5">
    <livewire:checkout :donor="$donor" />
</section>

@endsection
