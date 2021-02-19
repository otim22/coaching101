@push('scripts')
    <script src="{{ asset('js/audience.js')}}" type="text/javascript"></script>
@endpush

@prepend('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
@endprepend
