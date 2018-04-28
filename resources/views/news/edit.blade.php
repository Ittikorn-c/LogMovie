@extends("mod/master")

@push("style")
<style media="screen">
  img {
    max-width: 200px;
    margin: 10px;
  }
</style>
@endpush

@section("title-page")
<h1>Create New Page</h1>
@endsection

@section("content")
<div class="container">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    </div>
  @endif
  @if(Session::has('status'))
    <div class="alert alert-{{ Session::get('status') }}" role="alert">
      <p>{{ Session::get('message') }}</p>
    </div>
  @endif
  <form runat="server" class="form-horizontal" novalidate enctype="multipart/form-data" method="post" action="/news/{{ $news->id }}">

      @method('PUT')
    {{ csrf_field() }}
      <div id="title_field" class="form-inline">
        <label>Title : </label>
        <input value="{{ old('title')  ?? $news->title }}" type="text" name="title" required class="form-control"/>
        @if ($errors->has('title'))
        <div class="text-danger">{{ $errors->first('title')}}</div>
        @endif
      </div>
      <div id="images_select" class="form-inline">
        <label>Select images : </label>
        <input id="file_upload" type="file" class="form-control" name="images[]" placeholder="address" multiple>
        @if ($errors->has('images'))
        <div class="text-danger">{{ $errors->first('images') }}</div>
        @endif
      </div>
      <label>Preview : </label>
      <div id="thumbnail"></div>
      <div id="detail_field" class="form-inline">
        <label>Detail : </label>
        <textarea type="text" name="detail" required class="form-control">{{ old('detail') ?? $news->detail }}</textarea>
        @if ($errors->has('detail'))
        <div class="text-danger">{{ $errors->first('detail') }}</div>
        @endif
      </div>
      <div id="references_field" class="form-inline">
        <label>References : </label>
        <input value="{{ old('references') ?? $news->references }}" type="text" name="references" required class="form-control"/>
        @if ($errors->has('references'))
        <div class="text-danger">{{ $errors->first('references') }}</div>
        @endif
      </div>
    <div class="form-group">
      <input type="submit" value="Save Image" class="btn btn-info">
    </div>
  </form>
</div>
<script type="text/javascript" >
  $(function () {
    $("#upload").on("click",function(e){
      $("#file_upload").show().click().hide();
      e.preventDefault();
    });
    $("#file_upload").on("change",function(e){
      var files = this.files
      showThumbnail(files)
    });
    function showThumbnail(files){
      $("#thumbnail").html("");
      for(var i=0;i<files.length;i++){
        var file = files[i]
        var imageType = /image.*/
        if(!file.type.match(imageType)){
          //     console.log("Not an Image");
          continue;
        }
        var image = document.createElement("img");
        var thumbnail = document.getElementById("thumbnail");
        image.file = file;
        thumbnail.appendChild(image)
        var reader = new FileReader()
        reader.onload = (function(aImg){
          return function(e){
            aImg.src = e.target.result;
          };
        }(image))
        var ret = reader.readAsDataURL(file);
        var canvas = document.createElement("canvas");
        ctx = canvas.getContext("2d");
        image.onload= function(){
          ctx.drawImage(image,.5,.5);
        }
      }
    }
  });
</script>
@endsection
