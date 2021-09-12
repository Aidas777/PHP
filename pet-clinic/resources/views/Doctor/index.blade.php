@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Gydytojų sąrašas</div>

               <div class="card-body">
{{-- //// --}}
                @foreach ($doctors as $doctor)
                <a href="{{route('doctor.edit',[$doctor])}}">{{$doctor->id}}. {{$doctor->name}} {{$doctor->surname}} {{$doctor->category}}</a>

                <div>
                  @if($doctor->getPet->count())
                  <small>Priskirtų gyvūnų skaičius: {{$doctor->getPet->count()}}</small>
                  @else
                  <small>Šiuo metu nėra priskirtų gyvūnų.</small> 
                  @endif
                </div>


                <form method="POST" action="{{route('doctor.destroy', $doctor)}}">
                @csrf
                <button type="submit">Delete</button>
                </form>
                <br>
              @endforeach
{{-- //// --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Gydytojų sąrašas @endsection
