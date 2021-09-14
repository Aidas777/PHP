@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Gydytojas: {{$doctor->name}} {{$doctor->surname}}</div>

               <div class="card-body">
{{-- //// --}}
                    <div class="form-group">

                        @foreach ($doctor->getPet as $pet)
                        <div class="client-board">
                            <div class="board-first">
                                <div class="board-col-name">
                                    Augintinis Nr. {{$pet->id}}
                                </div>
                                <div class="board-data"><b>{{$pet->species}} {{$pet->name}} </b> <small> <i> &nbsp Gim. {{$pet->birth_date}} &nbsp Reg. {{$pet->created_at->format('Y.m.d')}}</i></small></div>
                                <div class="little-txt"><small><i>Document: {{$pet->document}}</i></small></div>
                            </div>
                            <div class="board-second">
                                <div class="board-col-name">
                                    Savininkas
                                </div>
                                <div class="board-data"><b>{{$pet->getOwner->name}} {{$pet->getOwner->surname}}</b></div>
                                <div class="little-txt"><small><i>{{$pet->getOwner->contacts}}</i></small></div>
                            </div>
                        </div>

                        @endforeach

                    </div>

                <div class="btn-center">
                    <a href="{{route('doctor.index')}}" class="btn edit">Back</a>
                </div>
{{-- //// --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') {{$doctor->name}} {{$doctor->surname}} @endsection
