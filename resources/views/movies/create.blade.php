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
      .h1 {
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
  <h1 class="h1">Create Movie Page</h1>
  <form runat="server" class="form-horizontal" novalidate enctype="multipart/form-data" method="post" action="/movies/store">
    {{ csrf_field() }}
    <div class="form-group">
      <div class="form-group row">
        <label for="name_field" class="col-sm-3 col-form-label">Name : </label>
        <div class="col-sm-5">
          <input id="name_field" value="{{ old('name') }}" type="text" name="name" required class="form-control"/>
        </div>
      </div>
      @if ($errors->has('name'))
      <div class="text-danger col-sm-12">{{ $errors->first('name') }}</div>
      @endif
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="file_cover_upload">Cover image : </label>
          <div class="custom-file col-sm-6">
            <input id="file_cove_upload" type="file" class="form-control-file" name="cover_image" placeholder="address">
          </div>
      </div>
      @if ($errors->has('cover_image'))
      <div class="text-danger col-sm-12">{{ $errors->first('cover_image') }}</div>
      @endif
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="vdo_field">Link trailer : </label>
          <div class="custom-file col-sm-7">
            <input id="vdo_field" value="{{ old('vdo') }}" type="text" name="vdo" class="form-control"/>
          </div>
      </div>
      @if ($errors->has('vdo'))
      <div class="text-danger col-sm-12">{{ $errors->first('vdo') }}</div>
      @endif
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="storyline_field">Storyline : </label>
          <div class="custom-file col-sm-9">
            <textarea rows="7" id="storyline_field" type="text" name="storyline" class="form-control">{{ old('storyline') }}</textarea>
          </div>
      </div>
      @if ($errors->has('storyline'))
      <div class="text-danger col-sm-12">{{ $errors->first('storyline') }}</div>
      @endif
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-group row"></div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="budget_field">Budget</label>
          <input id="budget_field" type="number" name="budget" value="{{ old('budget') }}" class="form-control"/>
        </div>
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-4">
          <label for="opening_field">Opening</label>
          <input id="opening_field" type="number" name="opening" value="{{ old('opening') }}" class="form-control"/>
        </div>
        <div class="form-group col-md-2"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          @if ($errors->has('budget'))
          <div class="text-danger">{{ $errors->first('budget') }}</div>
          @endif
        </div>
        <div class="form-group col-md-6">
          @if ($errors->has('opening'))
          <div class="text-danger">{{ $errors->first('opening') }}</div>
          @endif
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="gross_field">Gross</label>
          <input id="gross_field" type="number" name="gross" class="form-control" value="{{ old('gross') }}"/>
        </div>
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-4">
          <label for="cumulative_field">Cumulative</label>
          <input id="cumulative_field" type="number" name="cumulative" class="form-control" value="{{ old('cumulative') }}"/>
        </div>
        <div class="form-group col-md-2"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          @if ($errors->has('gross'))
          <div class="text-danger">{{ $errors->first('gross') }}</div>
          @endif
        </div>
        <div class="form-group col-md-6">
          @if ($errors->has('cumulative'))
          <div class="text-danger">{{ $errors->first('cumulative') }}</div>
          @endif
        </div>
      </div>
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="runtime_field">Runtime : </label>
          <div class="custom-file col-sm-4">
            <input id="runtime_field" type="number" name="runtime" class="form-control" value="{{ old('runtime') }}"/>
          </div>
      </div>
      @if ($errors->has('runtime'))
      <div class="text-danger col-sm-12">{{ $errors->first('runtime') }}</div>
      @endif
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="color_field">Color : </label>
          <div class="custom-file col-sm-4">
            <select id="color_field" class="form-control" name="color">
              @foreach ($color as $key => $value)
                @if(old('color') == $key)
                  <option value="{{ $value }}" selected>{{ $key }}</option>
                @else
                  <option value="{{ $value }}">{{ $key }}</option>
                @endif
              @endforeach
            </select>
          </div>
      </div>
      @if ($errors->has('color'))
      <div class="text-danger col-sm-12">{{ $errors->first('color') }}</div>
      @endif
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="aspect_ratio_field">Aspect ratio : </label>
          <div class="custom-file col-sm-4">
            <input id="aspect_ratio_field" type="text" name="aspect_ratio" class="form-control" value="{{ old('aspect_ratio') }}"/>
          </div>
      </div>
      @if ($errors->has('aspect_ratio'))
      <div class="text-danger col-sm-12">{{ $errors->first('aspect_ratio') }}</div>
      @endif
      <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="genres_select">Genres : </label>
          <div class="custom-file col-sm-7">
            <div id="genres_select" class="btn-group" role="group" aria-label="Basic example">
              @foreach($genres as $key => $value)
                <label class="btn btn-outline-dark">
                @if(old('genres') == $key)
                  <input type="checkbox" name="genres[]" value="{{ $value }}" checked/>{{ $value }}
                @else
                  <input type="checkbox" name="genres[]" value="{{ $value }}" />{{ $value }}
                @endif
                </label>
              @endforeach
            </div>
          </div>
      </div>
      @if ($errors->has('genres'))
      <div class="text-danger col-sm-12">{{ $errors->first('genres') }}</div>
      @endif
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="file_upload">Select images</label>
          <input id="file_upload" type="file" class="form-control-file" name="images[]" placeholder="address" multiple>
        </div>
        <div class="form-group col-md-8">
          <label for="thumbnail">Preview : </label>
          <div id="thumbnail"></div>
        </div>
      </div>
      @if ($errors->has('images'))
      <div class="text-danger col-sm-12">{{ $errors->first('images') }}</div>
      @endif
    </div>
    <div class="form-group">
      <center><input type="submit" value="Submit" class="btn btn-secondary btn-lg"></center>
    </div>
  </form>
  </div>
</div>
<script type="text/javascript" >
  $(function () {
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
