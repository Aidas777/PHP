@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Post</div>

               <div class="card-body">
                    {{--  --}}
                    <form method="POST" action="{{route('parcel.update',$parcel)}}">

                        <div class="form-group">
                            <label>Weight</label>
                            <input type="text" name="parcel_weight" class="form-control" value = "{{old('parcel_weight', $parcel->weight)}}">
                            <small class="form-text text-muted">Enter parcel weight</small>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="parcel_phone" class="form-control" value = "{{old('parcel_phone', $parcel->phone)}}">
                            <small class="form-text text-muted">Enter receivers phone</small>
                        </div>

                        <div class="form-group">
                            <label>Info</label>
                            <textarea name="parcel_info"  class="form-control" id="summernote">{!!old('parcel_info', $parcel->info)!!}</textarea>
                            <small class="form-text text-muted">Enter parcel info</small>
                        </div>

                        <div class="form-group">
                            <label>Post</label>
                            <select name="post_id" class="form-control">
                                @foreach ($posts as $post)
                                    <option value="{{$post->id}}" @if(old('post_id', $parcel->post_id) ==  $post->id) selected @endif>
                                        {{$post->code}} {{$post->town}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Set parcels post</small>
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

@section('title') Edit Post @endsection