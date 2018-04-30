@extends("layouts/master")

@section("header")

@endsection
<style media="screen">
  .mainbody {
    margin: 5%;
    margin-top: 10%;
    padding: 20px;
    border: 1px solid #e1e2ec;
    border-radius: 20px;
  }
  .detail {
    word-wrap: break-word;
    font-size: 18px;
  }
  .date {
    color: #b5b5b5;
    font-size: 14px;
  }
  .card {
    margin-bottom: 10px;
  }

</style>
@section("content")
<div class="container">
  <div class="mainbody">
    <h1>News</h1>
    <hr>
    <div class="row">
      @foreach ($news as $new)
      <div class="col-sm-3">
        <div class="card">
          <img class="card-img-top" src="{{ $new->imgs[0]->image }}">
          <div class="card-body">
            <a style="color:black; hover:text-decoration: none;" href="/news/{{ $new->id }}"><h5 class="card-title">{{ $new->title }}</h5></a>
            <p class="card-text"><small class="text-muted">{{ $new->created_at }}</small></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
