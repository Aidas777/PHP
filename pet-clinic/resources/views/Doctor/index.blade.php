@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Gydytojų sąrašas</div>

               <div class="card-body">
{{-- //// --}}
                <ul class="petforms-all">
                    @foreach ($doctors as $doctor)
                    <li class="one-ownerform">
                      <span class="one-ownerform-data">
                          {{$doctor->id}}. <b class="item-name">{{$doctor->name}} {{$doctor->surname}}</b>
                           <i class="little-data">{{$doctor->category}}</i>

                          <div>
                              @if($doctor->getPet->count())
                                  <small class="ital">Priskirtų gyvūnų skaičius: {{$doctor->getPet->count()}}</small>
                              @else
                                  <small class="ital">Šiuo metu nėra priskirtų gyvūnų.</small> 
                              @endif
                          </div>
                      </span>

                        <div class="btns-3">

                                <a href="{{route('doctor.edit',[$doctor])}}" class="btn edit">Edit</a>

                                <a href="{{route('doctor.show',[$doctor])}}" class="btn show">Show</a>

                            <form method="POST" action="{{route('doctor.destroy', $doctor)}}">
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

@section('title') Gydytojų sąrašas @endsection
