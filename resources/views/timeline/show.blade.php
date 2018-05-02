@extends('layouts.master')

@section('header')
<style>
    section.sec1{
        width: 100%;
        height: 100vh;
        background-image: url(/BG/bg.jpg);
        background-size: cover;
        background-position: center;
    }

    .checked {
        color: orange;
    }

    .wraptext {
        word-wrap: break-word;
    }
}

</style>

<section class="sec1">
    <div class="text-head w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
        {{ $user->name }}
    </div>
</section>
@endsection

@section('content')
    <div class="container">
        <div class="row content">
            <div class="col-sm-4" style="padding:5px">
                <div style="border: 1px solid black; padding:5px; border-radius: 5px;">
                    <h2>Introduce</h2>
                    <hr>
                    <img class="text-center mx-auto d-block" style="border-radius: 50%; width:150px; height:150px"
                     src="/storage/avatars/{{$user->profile->avatar}}">
                    <br>
                    <p><i class="fa fa-user-circle"></i>{{ $user->name }}</p>
                    <p><i class="fa fa-envelope"></i>{{ $user->email }}</p>
                </div>
            </div>

            <div class="col-sm-8" style="padding:5px; ">
                <div style="border: 1px solid black; border-radius: 5px;">
                    <h1>Review</h1>

                    <hr>
                    @foreach($reviews as $review)
                    <center><div class="w3-card-4 w3-margin" style="width:60%;">
                        <a href="/movies/{{ $review->movie->id }}"><div class="w3-display-container w3-text-white">
                            <img src="../{{ $review->movie->cover_image }}" style="width:100%">
                            <div class="w3-xlarge w3-display-bottomleft w3-padding">{{ $review->movie->name }}</div>
                        </div></a>
                        <div class="w3-row">
                            <p style="margin: 5px">Rate:
                            @for($i = 0; $i < $review->rate; $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            @for($i = 0; $i < 10 - $review->rate; $i++)
                                <span class="fa fa-star"></span>
                            @endfor
                            </p>
                        </div>
                        <div class="w3-row" style="word-wrap: break-word; margin: 5px">
                            <strong>Title:<strong> {{ $review->header }}
                        </div>
                        <div class="w3-row" style="word-wrap: break-word; margin: 5px;">
                            <strong>Review:</strong>
                            {{ $review->review }}
                        </div>
                        @guest
                        <p>like this review</p>
                        <a href="/login"><p>Please Login</p></a>
                        @else
                        <div class="w3-row">
                            <form id="likeForm-{{$review->id}}" name="likeForm" action="/likereviews" method="post">
                                <input hidden type="text" id="review_id" name="review_id" value="{{ $review->id }}">
                                {{ csrf_field() }}
                                <p style="margin: 5px"><a href="javascript:{}" onclick="document.getElementById('likeForm-{{$review->id}}').submit();"><i class="far fa-heart"></i></a> Like: {{ $review->countLike() }}</p>
                            </form>
                        </div>
                        @endguest
                    </div></center>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
