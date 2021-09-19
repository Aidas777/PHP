@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Reservoir</div>

               <div class="card-body">
                 {{--  --}}
                 <form method="POST" action="{{route('reservoir.store')}}">
                    {{-- Title: <input type="text" name="reservoir_title"> --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="reservoir_title"  class="form-control">
                        <small class="form-text text-muted">Enter reservoir title</small>
                    </div>

                    {{-- Area: <input type="text" name="reservoir_area"> --}}
                    <div class="form-group">
                        <label>Area</label>
                        <input type="text" name="reservoir_area"  class="form-control">
                        <small class="form-text text-muted">Enter reservoir area in decimals</small>
                    </div>

                    {{-- About: <textarea name="reservoir_about" id="summernote"></textarea> --}}
                    <div class="form-group">
                        <label>About</label>
                        <textarea name="reservoir_about" class="form-control" id="summernote"></textarea>
                        <small class="form-text text-muted">Enter reservoir info</small>
                    </div>
                
                    @csrf
                    <div class="btn-center">
                        <button type="submit" class="btn addbtn">Add</button>
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

@section('title') New Reservoir @endsection
