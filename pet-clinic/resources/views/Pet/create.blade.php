


@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Naujas Gyvūnas</div>
 
                <div class="card-body">
{{-- //// --}} 
                    <form method="POST" action="{{route('pet.store')}}">
                        {{-- Vardas: <input type="text" name="pet_name"> --}}
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" name="pet_name" class="form-control">
                            <small class="form-text text-muted">Nurodykite augintinio vardą</small>
                        </div>

                        {{-- Rūšis: <input type="text" name="pet_species"> --}}
                        <div class="form-group">
                            <label>Rūšis</label>
                            <input type="text" name="pet_species" class="form-control">
                            <small class="form-text text-muted">Nurodykite rūšį / tipą.</small>
                        </div>

                        {{-- Gim. data: <input type="text" name="pet_bdate"> --}}
                        <div class="form-group">
                            <label>Gimimo data</label>
                            <input type="text" name="pet_bdate" class="form-control">
                            <small class="form-text text-muted">Nurodykite gimimo datą.</small>
                        </div>

                        {{-- Documentas: <input type="text" name="pet_document"> --}}
                        <div class="form-group">
                            <label>Documentas</label>
                            <input type="text" name="pet_document" class="form-control">
                            <small class="form-text text-muted">Nurodykite documentą.</small>
                        </div>

                        {{-- Istorija: <textarea name="pet_history"></textarea> --}}
                        <div class="form-group">
                            <label>Istorija</label>
                            <textarea type="text" name="pet_history" class="form-control"></textarea>
                            <small class="form-text text-muted">Nurodykite istoriją.</small>
                        </div>

                        <div class="form-group">
                            <label>Savininkas</label>
                            <select name="owner_id" class="form-control">
                                @foreach ($owners as $owner)
                                    <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>
                                @endforeach
                            </select>

                            <label><b>Gydytojas</b></label>
                            <select name="doctor_id" class="form-control">
                                @foreach ($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->surname}}</option>
                                @endforeach
                            </select>
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

@section('title') Naujas Gyvūnas @endsection
 
