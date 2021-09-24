@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Post</div>

               <div class="card-body">
                    {{--  --}}
                    <form method="POST" action="{{route('post.update',$post)}}">

                        {{-- Title: <input type="text" name="post_title"> --}}
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="post_code" class="form-control" value="{{old('post_code', $post->code)}}">
                            <small class="form-text text-muted">Enter post code</small>
                        </div>

                        {{-- Area: <input type="text" name="post_area"> --}}
                        <div class="form-group">
                            <label>Town</label>
                            <input type="text" name="post_town" class="form-control" value="{{old('post_town', $post->town)}}">
                            <small class="form-text text-muted">Enter post Town</small>
                        </div>

                        <div class="form-group">
                            <label>Capacity</label>
                            <input type="text" name="post_capacity"  class="form-control" value = "{{old('post_capacity', $post->capacity)}}">
                            <small class="form-text text-muted">Enter Post capacity</small>
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

@endsection

@section('title') Edit Post @endsection