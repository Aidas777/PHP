@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Reservoir</div>

               <div class="card-body">
                    {{--  --}}
                    <form method="POST" action="{{route('reservoir.update',$reservoir)}}">
                            {{-- Title: <input type="text" name="reservoir_title" value="{{$reservoir->title}}">
                            Area: <input type="text" name="reservoir_area" value="{{$reservoir->area}}">
                            About: <textarea name="reservoir_about" id="summernote">{{$reservoir->about}}</textarea> --}}

                        {{-- Title: <input type="text" name="reservoir_title"> --}}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="reservoir_title" class="form-control" value="{{old('reservoir_title', $reservoir->title)}}">
                            <small class="form-text text-muted">Enter reservoir title</small>
                        </div>

                        {{-- Area: <input type="text" name="reservoir_area"> --}}
                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" name="reservoir_area" class="form-control" value="{{old('reservoir_area', $reservoir->area)}}">
                            <small class="form-text text-muted">Enter reservoir area in decimals</small>
                        </div>

                        {{-- About: <textarea name="reservoir_about" id="summernote"></textarea> --}}
                        <div class="form-group">
                            <label>About</label>
                            <textarea name="reservoir_about" class="form-control" id="summernote">{{old('reservoir_about', $reservoir->about)}}</textarea>
                            <small class="form-text text-muted">Enter reservoir info</small>
                        </div>
                    
                        @csrf
                        <div class="btn-center">
                            {{-- <button type="submit" class="btn confirm">back</button> --}}
                            <button type="submit" class="btn confirm">Update</button>
                        </div>
                    </form>
                    {{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>

@endsection

@section('title') Edit Reservoir @endsection