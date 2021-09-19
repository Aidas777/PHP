@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Member</div>

               <div class="card-body">
                   {{--  --}}
                   <form method="POST" action="{{route('member.update',[$member])}}">
                    {{-- Name: <input type="text" name="member_name" value="{{$member->name}}"> --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="member_name"  class="form-control" value = "{{old('member_name', $member->name)}}">
                        <small class="form-text text-muted">Enter memmber name</small>
                    </div>

                    {{-- Surname: <input type="text" name="member_surname" value="{{$member->surname}}"> --}}
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="member_surname"  class="form-control" value="{{old('member_surname', $member->surname)}}">
                        <small class="form-text text-muted">Enter memmber surname</small>
                    </div>

                    {{-- Live: <input type="text" name="member_live" value="{{$member->live}}"> --}}
                    <div class="form-group">
                        <label>Live</label>
                        <input type="text" name="member_live"  class="form-control" value="{{old('member_live', $member->live)}}">
                        <small class="form-text text-muted">Enter Memmber living location</small>
                    </div>

                    {{-- Experience: <input type="text" name="member_experience" value="{{$member->experience}}"> --}}
                    <div class="form-group">
                        <label>Experience</label>
                        <input type="text" name="member_experience" class="form-control" value="{{old('member_experience', $member->experience)}}">
                        <small class="form-text text-muted">Enter Memmber experience in years</small>
                    </div>

                    {{-- Registered: <textarea name="member_registered">{{$member->registered}}</textarea> --}}
                    <div class="form-group">
                        <label>Registered</label>
                        <input type="text" name="member_registered" class="form-control" value="{{old('member_registered', $member->registered)}}">
                        <small class="form-text text-muted">Knygos pavadinimas.</small>
                    </div>
                
                    <div class="form-group">
                        <label>Reservoir</label>
                        <select name="reservoir_id" class="form-control">
                            @foreach ($reservoirs as $reservoir)
                                <option value="{{$reservoir->id}}" @if(old('reservoir_id', $member->reservoir_id) == $reservoir->id) selected @endif>
                                    {{$reservoir->title}} {{$reservoir->area}}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Set Memmbers reservoir</small>
                    </div>
                    @csrf
                    <div class="btn-center">
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

@section('title') Edit Member @endsection

