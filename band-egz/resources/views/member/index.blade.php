@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Members List</div>

               <div class="card-body">
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
                                <div class="little-txt txtblue"><i><b>Registered for years: </b>
                                     &nbsp {{$member->registered ?? 'not set'}}</i>
                                </div>
                                <div class="little-txt txtblue"><i><b>Reservoir: </b>
                                    &nbsp <small>{{$member->getReservoir->title ?? ''}} {{$member->getReservoir->area ?? 'not set'}}</small></i>
                               </div>
                            </span>

                            <div class="btns">
                                <div>
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
                 {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Members List @endsection
