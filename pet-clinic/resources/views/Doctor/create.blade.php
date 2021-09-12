@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujas Gydytojas</div>

               <div class="card-body">
{{-- //// --}}
                <form method="POST" action="{{route('doctor.store')}}">
                    Vardas: <input type="text" name="doctor_name">
                    Pavardė: <input type="text" name="doctor_surname">
                    Kategorija: <input type="text" name="doctor_category">
                    @csrf
                    <button type="submit">ADD</button>
                </form>
{{-- //// --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Naujas Gydytojas @endsection
