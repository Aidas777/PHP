@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Company</div>

               <div class="card-body">
{{--  --}}
                    <form method="POST" action="{{route('company.store')}}">
                        {{-- Name: <input type="text" name="company_name"> --}}
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" value = "{{old('company_name')}}">
                            <small class="form-text text-muted">Enter company name</small>
                        </div>

                        {{-- Surname: <input type="text" name="company_surname"> --}}
                        <div class="form-group">
                            <label>Company Address</label>
                            <input type="text" name="company_address" class="form-control" value = "{{old('company_address')}}">
                            <small class="form-text text-muted">Enter company address</small>
                        </div>

                        {{-- Live: <input type="text" name="company_live">
                        <div class="form-group">
                            <label>Capacity</label>
                            <input type="text" name="company_capacity"  class="form-control" value = "{{old('company_capacity')}}">
                            <small class="form-text text-muted">Enter Post capacity</small>
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

@section('title') New Company @endsection