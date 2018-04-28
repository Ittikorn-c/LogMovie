@extends("mod/master")

@push("style")
<style media="screen">
      img {
        max-width: 200px;
        margin: 10px;
      }
      .custom-file-label {
        overflow: hidden;
      }
</style>
@endpush

@section("title-page")
<h1>Create Movie Page</h1>
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
  <form runat="server" class="form-horizontal" novalidate enctype="multipart/form-data" method="post" action="/movies/store">
    {{ csrf_field() }}
    <div class="form-group">
      <div id="cover_image_field" class="form-inline">
        <label>Cover image : </label>
        <div class="custom-file">
          <input id="file_cover_upload" type="file" class="custom-file-input" name="cover_image" placeholder="address">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div>
      <div id="name_field" class="form-inline">
        <label>Name : </label>
        <input value="{{ old('name') }}" type="text" name="name" required class="form-control"/>
        @if ($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
      </div>
      <div id="vdo_field" class="form-inline">
        <label>Link trailer : </label>
        <input value="{{ old('vdo') }}" type="text" name="vdo" class="form-control"/>
        @if ($errors->has('vdo'))
        <div class="text-danger">{{ $errors->first('vdo') }}</div>
        @endif
      </div>
      <div id="storyline_field" class="form-inline">
        <label>Storyline : </label>
        <input type="text" name="storyline" value="{{ old('storyline') }}" class="form-control"/>
        @if ($errors->has('storyline'))
        <div class="text-danger">{{ $errors->first('storyline') }}</div>
        @endif
      </div>
      <div id="budget_field" class="form-inline">
        <label>Budget : </label>
        <input type="number" name="budget" value="{{ old('budget') }}" class="form-control"/>
        @if ($errors->has('budget'))
        <div class="text-danger">{{ $errors->first('budget') }}</div>
        @endif
      </div>
      <div id="opening_field" class="form-inline">
        <label>Opening : </label>
        <input type="number" name="opening" value="{{ old('opening') }}" class="form-control"/>
        @if ($errors->has('opening'))
        <div class="text-danger">{{ $errors->first('opening') }}</div>
        @endif
      </div>
      <div id="gross_field" class="form-inline">
        <label>Gross : </label>
        <input type="number" name="gross" class="form-control" value="{{ old('gross') }}"/>
        @if ($errors->has('gross'))
        <div class="text-danger">{{ $errors->first('gross') }}</div>
        @endif
      </div>
      <div id="cumulative_field" class="form-inline">
        <label>Cumulative : </label>
        <input type="text" name="cumulative" class="form-control" value="{{ old('cumulative') }}"/>
        @if ($errors->has('cumulative'))
        <div class="text-danger">{{ $errors->first('cumulative') }}</div>
        @endif
      </div>
      <div id="runtime_field" class="form-inline">
        <label>Runtime : </label>
        <input type="number" name="runtime" class="form-control" value="{{ old('runtime') }}"/>
        @if ($errors->has('runtime'))
        <div class="text-danger">{{ $errors->first('runtime') }}</div>
        @endif
      </div>
      <div id="color_field" class="form-inline">
        <label>Color : </label>
        <select class="form-control" name="color">
          @foreach ($color as $key => $value)
            @if(old('color') == $key)
              <option value="{{ $value }}" selected>{{ $key }}</option>
            @else
              <option value="{{ $value }}">{{ $key }}</option>
            @endif
          @endforeach;
        </select>
      </div>
      <div id="aspect_ratio_field" class="form-inline">
        <label>Aspect ratio : </label>
        <input type="text" name="aspect_ratio" class="form-control" value="{{ old('aspect_ratio') }}"/>
        @if ($errors->has('aspect_ratio'))
        <div class="text-danger">{{ $errors->first('aspect_ratio') }}</div>
        @endif
      </div>
      <div id="genres_select" class="form-inline">
        <label>Genres : </label>
          @foreach($genres as $key => $value)
            @if(old('genres') == $key)
              <input type="checkbox" name="genres[]" value="{{ $value }}" checked/>{{ $value }}<br>
            @else
              <input type="checkbox" name="genres[]" value="{{ $value }}"/>{{ $value }}<br>
            @endif
          @endforeach
      </div>
      <div id="images_select" class="form-inline">
        <label>Select images : </label>
        <input id="file_upload" type="file" class="form-control" name="images[]" placeholder="address" multiple>
        @if ($errors->has('images'))
        <div class="text-danger">{{ $errors->first('images') }}</div>
        @endif
      </div>
    </div>
    <label>Preview : </label>
    <div id="thumbnail"></div>
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
<script type="text/javascript">
  $("input[type=file]").change(function () {
    var fieldVal = $(this).val();
    fieldVal = fieldVal.replace("C:\\fakepath\\", "");
    if (fieldVal != undefined || fieldVal != "") {
      $(this).next(".custom-file-label").attr('data-content', fieldVal);
      $(this).next(".custom-file-label").text(fieldVal);
    }

  });
</script>
@endsection
