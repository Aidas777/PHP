
 



@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Gyvūno duomenų redagavimas</div>

               <div class="card-body">
{{-- //// --}} 
                    <form method="POST" action="{{route('pet.update',[$pet])}}">

                        {{-- Name: <input type="text" name="pet_name" value="{{$pet->name}}"> --}}
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" class="form-control" name="pet_name" value="{{$pet->name}}">
                            <small class="form-text text-muted">Nurodykite augintinio vardą</small>
                        </div>

                        {{-- Specie: <input type="text" name="pet_species" value="{{$pet->species}}"> --}}
                        <div class="form-group">
                            <label>Rūšis</label>
                            <input type="text" class="form-control" name="pet_species" value="{{$pet->species}}">
                            <small class="form-text text-muted">Nurodykite augintinio rūšį</small>
                        </div>

                        {{-- Birth date: <input type="text" name="pet_bdate" value="{{$pet->birth_date}}"> --}}
                        <div class="form-group">
                            <label>Gimimo data</label>
                            <input type="text" class="form-control" name="pet_bdate" value="{{$pet->birth_date}}">
                            <small class="form-text text-muted">Nurodykite augintinio gimimo datą</small>
                        </div>

                        {{-- Document: <input type="text" name="pet_document" value="{{$pet->document}}"> --}}
                        <div class="form-group">
                            <label>Dokumentas</label>
                            <input type="text" class="form-control" name="pet_document" value="{{$pet->document}}">
                            <small class="form-text text-muted">Nurodykite augintinio dokumentą</small>
                        </div>

                        {{-- History: <textarea name="pet_history">{{$pet->history}}</textarea> --}}
                        <div class="form-group">
                            <label>Istorija</label>
                            {{-- <input type="text" class="form-control" name="pet_name" value="{{$pet->history}}"> --}}
                            <textarea type="text" class="form-control" name="pet_history">{{$pet->history}}</textarea>
                            <small class="form-text text-muted">Augintinio istoriją</small>
                        </div>

                            {{-- Savininkas:
                            <select name="owner_id">
                                @foreach ($owners as $owner)
                                    <option value="{{$owner->id}}" @if($owner->id == $pet->owner_id) selected @endif>
                                        {{$owner->name}} {{$owner->surname}}
                                    </option>
                                @endforeach
                            </select> --}}

                        <div class="form-group">
                            <label>Savininkas</label>
                            <select name="owner_id" class="form-control">
                                @foreach ($owners as $owner)
                                    <option value="{{$owner->id}}" @if($owner->id == $pet->owner_id) selected @endif>
                                        {{$owner->name}} {{$owner->surname}}
                                    </option>
                                @endforeach
                            </select>

                            {{-- <input type="text" class="form-control" name="pet_name" value="{{$pet->name}}"> --}}
                            <small class="form-text text-muted">Nurodykite savininką</small>
                        </div>


                        <div class="form-group">
                            <label><b>Gydytojas</b></label>
                            <select name="doctor_id" class="form-control">
                                @foreach ($doctors as $doctor)
                                    <option value="{{$doctor->id}}" @if($doctor->id == $pet->doctor_id) selected @endif>
                                        {{$doctor->name}} {{$doctor->surname}}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nurodykite gydytoją</small>
                        </div>


                        @csrf
                        <button type="submit" class="btn confirm">Atnaujinti</button>
                    </form>
{{-- //// --}}                    
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Gyvūno redagavimas @endsection
