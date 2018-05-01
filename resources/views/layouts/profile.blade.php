@extends('layouts.empty')

@section('content')
    <div class="container">
        <div class="row flex-md-row position-relative">
            <div class="col-md-3 my-5 order-md-first order-12">
                @include('components.profile.profile_card')
            </div>
            @yield('main')
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.card-button').each(function () {
                if ($(this).attr('href') === window.location.href) {
                    $(this).addClass("bg-warning text-white");
                }
            })
        });
    </script>
@endpush