@extends("layouts/master")


@section("header")

@endsection

@section("content")

<style media="screen">
      img {
        max-width: 200px;
        margin: 10px;
      }
      .custom-file-label {
        overflow: hidden;
      }
      .body {
        margin-top: 12%;
        margin-bottom: 5%;
        padding: 20px 70px;
        background-color: #e1e2ec;
        border-width: 20px;
        border-radius: 20px;
      }
      h1 {
        font-size: 60px;
        text-align: center;
        margin: 40px ;
      }
      .form-group{
        font-size: 17px;
      }
      #thumbnail {
        font-size: 17px;
        min-height: 150px;
      }

      input[type=submit]:hover
  		{
        color: #9c9da4;
        background-color: #f0f8ff;
  		}
</style>

<div class="container">
  <div class="body">
  <h1>Create News Page</h1>
  <form runat="server" class="form-horizontal" novalidate enctype="multipart/form-data" method="post" action="/news/store">
    {{ csrf_field() }}
    <div class="form-group">
      <div class="form-group row">
        <label for="title_field" class="col-sm-3 col-form-label">Title : </label>
        <div class="col-sm-7">
          <input id="title_field" value="{{ old('title') }}" type="text" name="title" required class="form-control"/>
        </div>
      </div>
      @if ($errors->has('title'))
      <div class="text-danger col-sm-12">{{ $errors->first('title') }}</div>
      @endif
      <div class="form-group row">
        <label for="file_upload" class="col-sm-3 col-form-label">Select images : </label>
        <div class="col-sm-5">
          <input id="file_upload" type="file" class="form-control" name="images[]" placeholder="address" multiple>
        </div>
      </div>
      @if ($errors->has('images'))
      <div class="text-danger col-sm-12">{{ $errors->first('images') }}</div>
      @endif
      <div class="form-group row">
        <label for="thumbnail" class="col-sm-3 col-form-label">Preview : </label>
        <div class="col-sm-9">
          <div id="thumbnail"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="detail_field" class="col-sm-3 col-form-label">Detail : </label>
        <div class="col-sm-9">
          <textarea rows="10" id="detail_field" type="text" name="detail" required class="form-control">{{ old('detail') }}</textarea>
        </div>
      </div>
      @if ($errors->has('detail'))
      <div class="text-danger col-sm-12">{{ $errors->first('detail') }}</div>
      @endif
      <div class="form-group row">
        <label for="references_field" class="col-sm-3 col-form-label">References : </label>
        <div class="col-sm-9">
            <input id="references_field" value="{{ old('references') }}" type="text" name="references" required class="form-control"/>
        </div>
      </div>
      @if ($errors->has('references'))
      <div class="text-danger col-sm-12">{{ $errors->first('references') }}</div>
      @endif
    <div class="form-group">
      <center><input type="submit" value="Submit" class="btn btn-secondary btn-lg"/></center>
    </div>
  </div>
  </form>
  </div>
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
