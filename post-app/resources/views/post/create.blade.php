@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Post</div>

               <div class="card-body">
{{--  --}}
                    <form method="POST" action="{{route('post.store')}}">
                        {{-- Name: <input type="text" name="post_name"> --}}
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="post_code" class="form-control" value = "{{old('post_code')}}">
                            <small class="form-text text-muted">Enter post code</small>
                        </div>

                        {{-- Surname: <input type="text" name="post_surname"> --}}
                        <div class="form-group">
                            <label>Town</label>
                            <input type="text" name="post_town" class="form-control" value = "{{old('post_town')}}">
                            <small class="form-text text-muted">Enter town of Post</small>
                        </div>

                        {{-- Live: <input type="text" name="post_live"> --}}
                        <div class="form-group">
                            <label>Capacity</label>
                            <input type="text" name="post_capacity"  class="form-control" value = "{{old('post_capacity')}}">
                            <small class="form-text text-muted">Enter Post capacity</small>
                        </div>

                        {{-- Experience: <input type="text" name="post_experience"> --}}
                        {{-- <div class="form-group">
                            <label>Experience</label>
                            <input type="text" name="post_experience" class="form-control" value = "{{old('post_experience')}}">
                            <small class="form-text text-muted">Enter Post experience in years</small>
                        </div> --}}

                        {{-- Registered: <textarea name="post_registered"></textarea> --}}
                        {{-- <div class="form-group">
                            <label>Registered</label>
                            <input type="text" name="post_registered" class="form-control" value = "{{old('post_registered')}}">
                            <small class="form-text text-muted">Enter Post registrasion duration in years</small>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label>Reservoir</label>
                            <select name="reservoir_id" class="form-control">
                                @foreach ($reservoirs as $reservoir)
                                    <option value="{{$reservoir->id}}" @if(old('reservoir_id') ==  $reservoir->id) selected @endif>
                                        {{$reservoir->title}} {{$reservoir->area}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Set Posts reservoir</small>
                        </div> --}}
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

@endsection

@section('title') New Post @endsection