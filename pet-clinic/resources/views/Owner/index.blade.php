@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Savininkų sąrašas</div>

               <div class="card-body">
{{-- //// --}}
                  <ul class="petforms-all">
                    @foreach ($owners as $owner)
                    <li class="one-ownerform">
                      {{-- {{dd($owner->id, $owner->getPet[1]->species)}} --}}
                      <span class="one-ownerform-data">
                            <span><b class="item-name">{{$owner->name}} {{$owner->surname}}</b></span>
                            <div class="little-data"><b>Augintinis: </b> &nbsp {{$owner->getPet[0]->species ?? ''}} {{$owner->getPet[0]->name ?? 'nenurodyta'}}</div>
                      </span>

                        <div class="btns">

                            <div>
                                <a href="{{route('owner.edit',[$owner])}}" class="btn edit">Edit</a>
                            </div>

                            <form method="POST" action="{{route('owner.destroy', [$owner])}}">
                            @csrf
                            <button type="submit" class="btn danger">Delete</button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                  </ul>


                  {{-- @foreach ($books as $book)
                    <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>
                    <form method="POST" action="{{route('book.destroy', [$book])}}">
                    @csrf
                    <button type="submit">DELETE</button>
                    </form>
                    <br>
                  @endforeach --}}

{{-- //// --}}                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Savininkų sąrašas @endsection
