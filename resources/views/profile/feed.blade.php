@extends('layouts.profile')

@section('title', $user->name . '- LogMovie')

@section('main')
    <div class="col-md-9">
        <div class="mt-5 mb-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">About me</h6>
            @if($user->about_me)
                <div class="pt-3">
                    {{$user->about_me}}
                </div>
            @else
                <div class="pt-3">
                    No about me yet

                @if(Auth::id() == $user->id)
                        <a href="{{route('profile.edit', Auth::id())}}" class="btn-link text-warning">write one now</a>
                    @endif
                </div>

            @endif
        </div>
        <hr>
        <div class="my-3 p-3 bg-white box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">My reviews</h6>
            <div class="pt-3 text-muted">No reviews</div>
        </div>

        <div class="my-3 p-3 bg-white box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">My Favourite</h6>
            <div class="pt-3 text-muted">No Favourite</div>
        </div>
    </div>

@endsection

