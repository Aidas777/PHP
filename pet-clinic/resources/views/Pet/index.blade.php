@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="card-header">Gyvūnų sąrašas</div>

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
                                    {{-- <br> --}}
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

                    {{-- <div class="form-group">
                        <label>Gydytojas</label>
                        <input type="text" name="book_title"  class="form-control" value="{{$book->title}}">
                        <small class="form-text text-muted">Knygos pavadinimas.</small>
                    </div> --}}
{{-- //// --}}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Gyvūnų sąrašas @endsection