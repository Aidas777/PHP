@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Reservoirs List</div>

               <div class="card-body">
                 {{--  --}}
                    @foreach ($reservoirs as $reservoir)
                    {{-- {{dd($reservoir->getMember[0])}} --}}
                    <a href="{{route('reservoir.edit',[$reservoir])}}">{{$reservoir->title}} {{$reservoir->area}}
                        {{$reservoir->getMember[0]->name ?? ''}} {{$reservoir->getMember[0]->surname ?? ''}}</a>
                    <form method="POST" action="{{route('reservoir.destroy', $reservoir)}}">
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                    <br>
                    @endforeach
                 {{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Reservoirs List @endsection
