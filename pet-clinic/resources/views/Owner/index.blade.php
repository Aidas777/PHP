@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Savininkų sąrašas</div>

               <div class="card-body">
{{-- //// --}}

                  @foreach ($owners as $owner)
                  {{-- {{dd($owner->id, $owner->getPet[1]->species)}} --}}
                    <a href="{{route('owner.edit',[$owner])}}">{{$owner->name}} {{$owner->surname}}</a>
                    <div><small>Augintinis: {{$owner->getPet[0]->species ?? ''}} {{$owner->getPet[0]->name ?? 'nenurodyta'}}</small></div>
                    <form method="POST" action="{{route('owner.destroy', [$owner])}}">
                    @csrf
                    <button type="submit">Delete</button>
                    </form>
                    <br>
                  @endforeach


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
