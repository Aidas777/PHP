@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Gyvūnų sąrašas</h3>
                    <form action="{{route('pet.index')}}" method="get">
                        <fieldset>
                            <legend>Sort</legend>
                            <div class="block">
                            <button type="submit" class="btn btn-sort" name="sort" value="bdate">by Birth date</button>
                            <button type="submit" class="btn btn-sort" name="sort" value="species">by Species</button>
                            </div>
                            <div class="block">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" 
                                name="sort_dir" id="_1" 
                                value="asc" @if('desc' != $sortDirection) checked @endif>
                                <label class="form-check-label" for="_1">
                                Ascending
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio"
                                 name="sort_dir" id="_2"
                                  value="desc" @if('desc'== $sortDirection) checked @endif>
                                <label class="form-check-label" for="_2">
                                Descending
                                </label>
                              </div>
                            </div>
                            <div class="block">
                             
                                <a href="{{route('pet.index')}}" class="btn danger">Reset</a>
                            </div>
                        </fieldset>
                       </form>

                       {{--  --}}
                       <form action="{{route('pet.index')}}" method="get">
                            <fieldset>
                                <legend>Filter</legend>
                                <div class="block">
                                    {{-- <div class="form-group"> --}}
                                        <select class="form-control" name="doctor_id">
                                            <option value="0" disabled selected>Select Doctor</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{$doctor->id}}" @if($doctor_id == $doctor->id) selected @endif>{{$doctor->name}} {{$doctor->surname}}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted"><i>Select doctor from the list.</i></small>
                                    {{-- </div> --}}
                                </div>

                                <div class="block">
                                    <button type="submit" class="btn btn-sort" name="filter" value="doctor">Filter</button>
                                    <a href="{{route('pet.index')}}" class="btn danger">Reset</a>
                                </div>
        
        
                        
                            </fieldset>
                      </form>
                      {{--  --}}


               </div>

                <div class="card-body">
{{-- //// --}}  
                    <ul class="petforms-all">
                        @foreach ($pets as $pet)
                            <li class="one-petform">
                                <div class="placeImg">
                                        @if($pet->photo)
                                        <img src="{{$pet->photo}}" alt="{{$pet->type}}">
                                        @else
                                        <img src="{{asset('img/no-image.jpg')}}" alt="{{$pet->type}}">
                                        @endif
                                </div>
                                <span class="one-petform-data">
                                    {{-- <a href="{{route('pet.edit',[$pet])}}" class="btn edit"> --}}
                                    <b class="item-name">{{$pet->name}} {{$pet->species}}</b>
                                    <div class="ital"><small>gim. {{$pet->birth_date}}</small></div>
                                      <div>
                                        <div><small class="ital"><b>Savininkas:</b> {{$pet->getOwner->name}} {{$pet->getOwner->surname}}</small></div>
                                        <div><small class="ital"><b>Gydytojas:</b> {{$pet->getDoctor->name}} {{$pet->getDoctor->surname}}</small></div>
                                    </div>
                                </span>

                                <div class="btns">
                                    <div>
                                        <a href="{{route('pet.edit',[$pet])}}" class="btn edit">Edit</a>
                                    </div>

                                    <form method="POST" action="{{route('pet.destroy', [$pet])}}">
                                        @csrf
                                        <button type="submit" class="btn danger">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

{{-- //// --}}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Gyvūnų sąrašas @endsection