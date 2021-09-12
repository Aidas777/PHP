 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Gydytojo duomenų redagavimas</div>

               <div class="card-body">
{{-- //// --}}                
                <form method="POST" action="{{route('doctor.update',$doctor)}}">
                    {{-- Name: <input type="text" name="doctor_name" value="{{$doctor->name}}"> --}}
                    <div class="form-group">
                        <label>Vardas</label>
                        <input type="text" name="doctor_name"  class="form-control" value="{{$doctor->name}}">
                        <small class="form-text text-muted">Nurodykite vardą</small>
                    </div>

                    {{-- Surname: <input type="text" name="doctor_surname" value="{{$doctor->surname}}"> --}}
                    <div class="form-group">
                        <label>Pavardė</label>
                        <input type="text" name="doctor_surname"  class="form-control" value="{{$doctor->surname}}">
                        <small class="form-text text-muted">Nurodykite pavardę</small>
                        </div>

                    {{-- Category: <input type="text" name="doctor_category" value="{{$doctor->category}}"> --}}
                    <div class="form-group">
                        <label>Kategorija</label>
                        <input type="text" name="doctor_category"  class="form-control" value="{{$doctor->category}}">
                        <small class="form-text text-muted">Nurodykite kategoriją</small>
                        </div>

                    @csrf
                    <div class="btn-center">
                        <button type="submit" class="btn confirm">Update</button>
                    </div>
                </form>
{{-- //// --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Gydytojo redagavimas @endsection
