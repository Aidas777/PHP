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
                    {{-- Vardas: <input type="text" name="doctor_name"> --}}
                    <div class="form-group">
                        <label>Vardas</label>
                        <input type="text" name="doctor_name" class="form-control">
                        <small class="form-text text-muted">Nurodykite vardą</small>
                    </div>

                    {{-- Pavardė: <input type="text" name="doctor_surname"> --}}
                    <div class="form-group">
                        <label>Pavardė</label>
                        <input type="text" name="doctor_surname" class="form-control">
                        <small class="form-text text-muted">Nurodykite pavardę</small>
                        </div>

                    {{-- Kategorija: <input type="text" name="doctor_category"> --}}
                    <div class="form-group">
                        <label>Kategorija</label>
                        <input type="text" name="doctor_category" class="form-control">
                        <small class="form-text text-muted">Nurodykite gydytojo kategoriją</small>
                    </div>

                    @csrf
                    <div class="btn-center">
                        <button type="submit" class="btn addbtn" >Add</button>
                    </div>
                </form>
{{-- //// --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Naujas Gydytojas @endsection
