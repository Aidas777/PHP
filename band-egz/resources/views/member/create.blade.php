@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Member</div>

               <div class="card-body">
{{--  --}}
                    <form method="POST" action="{{route('member.store')}}">
                        {{-- Name: <input type="text" name="member_name"> --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="member_name" class="form-control" value = "{{old('member_name')}}">
                            <small class="form-text text-muted">Enter member name</small>
                        </div>

                        {{-- Surname: <input type="text" name="member_surname"> --}}
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="member_surname" class="form-control" value = "{{old('member_surname')}}">
                            <small class="form-text text-muted">Enter Memmber surname</small>
                        </div>

                        {{-- Live: <input type="text" name="member_live"> --}}
                        <div class="form-group">
                            <label>Live</label>
                            <input type="text" name="member_live"  class="form-control" value = "{{old('member_live')}}">
                            <small class="form-text text-muted">Enter Memmber living location</small>
                        </div>

                        {{-- Experience: <input type="text" name="member_experience"> --}}
                        <div class="form-group">
                            <label>Experience</label>
                            <input type="text" name="member_experience" class="form-control" value = "{{old('member_experience')}}">
                            <small class="form-text text-muted">Enter Memmber experience in years</small>
                        </div>

                        {{-- Registered: <textarea name="member_registered"></textarea> --}}
                        <div class="form-group">
                            <label>Registered</label>
                            <input type="text" name="member_registered" class="form-control" value = "{{old('member_registered')}}">
                            <small class="form-text text-muted">Enter Memmber registrasion duration in years</small>
                        </div>

                        <div class="form-group">
                            <label>Reservoir</label>
                            <select name="reservoir_id" class="form-control">
                                @foreach ($reservoirs as $reservoir)
                                    <option value="{{$reservoir->id}}" @if(old('reservoir_id') ==  $reservoir->id) selected @endif>
                                        {{$reservoir->title}} {{$reservoir->area}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Set Memmbers reservoir</small>
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

@endsection

@section('title') New Member @endsection
