@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujas Savininkas</div>

               <div class="card-body">
{{-- //// --}}
                <form method="POST" action="{{route('owner.store')}}">
                    {{-- Name: <input type="text" name="owner_name"> --}}
                    <div class="form-group">
                        <label>Vardas</label>
                        <input type="text" name="owner_name" class="form-control">
                        <small class="form-text text-muted">Nurodykite vardą</small>
                    </div>

                    {{-- Surname: <input type="text" name="owner_surname"> --}}
                    <div class="form-group">
                        <label>Pavardė</label>
                        <input type="text" name="owner_surname" class="form-control">
                        <small class="form-text text-muted">Nurodykite pavardę</small>
                    </div>

                    {{-- Contacts: <textarea name="owner_contacts"></textarea> --}}
                    <div class="form-group">
                        <label>Kontaktinė informacija</label>
                        <textarea type="text" name="owner_contacts" class="form-control"></textarea>
                        <small class="form-text text-muted">Nurodykite kontaktinę informaciją.</small>
                    </div>
                
                    
                    {{-- <select name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                        @endforeach
                    </select> --}}
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

@section('title') Naujas Savininkas @endsection






