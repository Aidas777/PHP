@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{-- down --}}
                    <h3>Members List</h3>
                    <form action="{{route('member.index')}}" method="get">
                    <fieldset>
                        <legend>Sort</legend>
                        <div class="block">
                                <button type="submit" class="btn btn-sort" name="sort" value="name">by Name</button>
                                <button type="submit" class="btn btn-sort" name="sort" value="experience">by Experience</button>
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
                            <a href="{{route('member.index')}}" class="btn danger">Reset</a>
                        </div>
                        </fieldset>
                    </form>

                    {{--  --}}
                    <form action="{{route('member.index')}}" method="get">
                       <fieldset>
                           <legend>Filter</legend>
                           <div class="block">
                               {{-- <div class="form-group"> --}}
                                   <select class="form-control" name="reservoir_id">
                                       <option value="0" disabled selected>Select Reservoir</option>
                                       @foreach ($reservoirs as $reservoir)
                                           <option value="{{$reservoir->id}}" @if($reservoir_id == $reservoir->id) selected @endif>{{$reservoir->title}} {{$reservoir->area}}</option>
                                           {{-- <option value="{{$doctor->id}}" @if($doctor_id == $doctor->id) selected @endif>{{$doctor->name}} {{$doctor->surname}}</option> --}}
                                       @endforeach
                                   </select>
                                   <small class="form-text text-muted"><i>Select reservoir from the list.</i></small>
                               {{-- </div> --}}
                           </div>

                           <div class="block">
                               <button type="submit" class="btn btn-sort" name="filter" value="reservoir">Filter</button>
                               <a href="{{route('member.index')}}" class="btn danger">Reset</a>
                           </div>
   
   
                   
                       </fieldset>
                    </form>
                 {{--  --}}


                </div>
               {{-- up --}}

                <div class="card-body">
                    <div class="paginate">{{$members->links()}}</div>
                 {{--  --}}
                    <ul class="petforms-all">
                        @foreach ($members as $member)
                        <li class="one-ownerform">
                            <div class="placeImg">
                                @if($member->photo)
                                <img src="{{$member->photo}}" alt="{{$member->name}}">
                                @else
                                <img src="{{asset('img/no-image.jpg')}}" alt="{{$member->type}}">
                                @endif
                            </div>

                            <span class="one-form-data">
                                <div class="item-name"><b>{{$member->name}} {{$member->surname}}</b></div>
                                <div class="little-txt txtblue"><i><b>Experience in years: </b>
                                     &nbsp {{$member->experience ?? 'not set'}}</i>
                                </div>
                                <div class="little-txt txtblue"><i><b>Reservoir: </b>
                                    &nbsp <small>{{$member->getReservoir->title ?? ''}} {{$member->getReservoir->area ?? 'not set'}}</small></i>
                               </div>
                            </span>

                            <div class="btns">
                                <div>
                                    {{-- <a href="{{route('member.show',[$member])}}" class="btn show">Show</a> --}}
                                    <a href="{{route('member.edit',[$member])}}" class="btn edit">Edit</a>
                                        {{-- {{$member->name}} {{$member->surname}}
                                        {{$member->getReservoir->title}}</a> --}}
                                </div>
                                <form method="POST" action="{{route('member.destroy', [$member])}}">
                                    @csrf
                                    <button type="submit" class="btn danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="paginate">{{$members->links()}}</div>
                 {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Members List @endsection
