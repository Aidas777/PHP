@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{-- down --}}
                    <h3>Parcels List</h3>
                    <form action="{{route('parcel.index')}}" method="get">
                    <fieldset>
                        <legend>Sort</legend>
                        <div class="block">
                                <button type="submit" class="btn btn-sort" name="sort" value="weight">by Weight</button>
                                <button type="submit" class="btn btn-sort" name="sort" value="phone">by Phone</button>
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
                            <a href="{{route('parcel.index')}}" class="btn danger">Reset</a>
                        </div>
                        </fieldset>
                    </form>

                    {{--  --}}
                    <form action="{{route('parcel.index')}}" method="get">
                       <fieldset>
                           <legend>Filter</legend>
                           <div class="block">
                               {{-- <div class="form-group"> --}}
                                   <select class="form-control" name="post_id">
                                       <option value="0" disabled selected>Select Post</option>
                                       @foreach ($posts as $post)
                                           <option value="{{$post->id}}" @if($post_id == $post->id) selected @endif>{{$post->code}} {{$post->town}}</option>
                                           {{-- <option value="{{$doctor->id}}" @if($doctor_id == $doctor->id) selected @endif>{{$doctor->name}} {{$doctor->surname}}</option> --}}
                                       @endforeach
                                   </select>
                                   <small class="form-text text-muted"><i>Select post from the list.</i></small>
                               {{-- </div> --}}
                           </div>

                           <div class="block">
                               <button type="submit" class="btn btn-sort" name="filter" value="post">Filter</button>
                               <a href="{{route('parcel.index')}}" class="btn danger">Reset</a>
                           </div>
   
   
                   
                       </fieldset>
                    </form>
                 {{--  --}}


                </div>
               {{-- up --}}

                <div class="card-body">
                    <div class="paginate">{{$parcels->links()}}</div>
                 {{--  --}}
                    <ul class="petforms-all">
                        @foreach ($parcels as $parcel)
                        <li class="one-ownerform">
                            <div class="placeImg">
                                @if($parcel->photo)
                                <img src="{{$parcel->photo}}" alt="{{$parcel->weight}}">
                                @else
                                <img src="{{asset('img/no-image.jpg')}}" alt="{{$parcel->info}}">
                                @endif
                            </div>
                            <div class="centr">
                                <div class="item-name"><b>{{$parcel->weight}} Kg</b></div>
                                <div class="little-txt txtblue"><i><b>Post: </b>
                                    &nbsp <small>{{$parcel->getPost->code ?? ''}} ({{$parcel->getPost->town ?? 'not set'}})</small></i>
                                </div>
                            </div>

                            <span class="one-form-data-27">
                                {{-- <div class="item-name"><b>{{$parcel->weight}} Kg</b></div> --}}
                                <div class="little-txt"><i>{{$parcel->phone}}</i></div>
                                <div class="little-txt txtblue"><i><b>Info: </b>
                                     &nbsp <small>{!!$parcel->info ?? 'not set'!!}</small></i>
                                </div>
                                {{-- <div class="little-txt txtblue"><i><b>Post: </b>
                                    &nbsp <small>{{$parcel->getPost->code ?? ''}} ({{$parcel->getPost->town ?? 'not set'}})</small></i>
                               </div> --}}
                            </span>

                            <div class="btns">
                                <div>
                                    {{-- <a href="{{route('parcel.show',[$parcel])}}" class="btn show">Show</a> --}}
                                    <a href="{{route('parcel.edit',[$parcel])}}" class="btn edit">Edit</a>
                                        {{-- {{$parcel->name}} {{$parcel->surname}}
                                        {{$parcel->getPost->title}}</a> --}}
                                </div>
                                <form method="POST" action="{{route('parcel.destroy', [$parcel])}}">
                                    @csrf
                                    <button type="submit" class="btn danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="paginate">{{$parcels->links()}}</div>
                 {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Parcels List @endsection