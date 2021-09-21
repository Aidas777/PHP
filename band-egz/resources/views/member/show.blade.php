@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Gydytojas: {{$member->name}} {{$member->surname}}</div>

               <div class="card-body">
{{-- //// --}}
                    <div class="form-group">

                        @foreach ($member->getReservoir as $reservoir)
                        <div class="client-board">
                            <div class="board-first">
                                <div class="board-col-name">
                                    Augintinis Nr. {{$reservoir->id}}
                                </div>
                                <div class="board-data"><b>{{$reservoir->species}} {{$reservoir->name}} </b> <small> <i> &nbsp Gim. {{$reservoir->birth_date}} &nbsp Reg. {{$reservoir->created_at->format('Y.m.d')}}</i></small></div>
                                <div class="little-txt"><small><i>Document: {{$reservoir->document}}</i></small></div>
                            </div>
                            <div class="board-second">
                                <div class="board-col-name">
                                    Savininkas
                                </div>
                                <div class="board-data"><b>{{$reservoir->getOwner->name}} {{$reservoir->getOwner->surname}}</b></div>
                                <div class="little-txt"><small><i>{{$reservoir->getOwner->contacts}}</i></small></div>
                            </div>
                        </div>

                        @endforeach

                    </div>

                <div class="btn-center">
                    <a href="{{route('member.index')}}" class="btn edit">Back</a>
                </div>
{{-- //// --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') {{$member->name}} {{$member->surname}} @endsection
