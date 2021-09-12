


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
                        Vardas: <input type="text" name="pet_name">
                        Rūšis: <input type="text" name="pet_species">
                        Gim. data: <input type="text" name="pet_bdate">
                        Documentas: <input type="text" name="pet_document">
                        Istorija: <textarea name="pet_history"></textarea>

                        Savininkas:
                        <select name="owner_id">
                            @foreach ($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>
                            @endforeach
                        </select>

                        Gydytojas:
                        <select name="doctor_id">
                            @foreach ($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->surname}}</option>
                            @endforeach
                        </select>
                    

                        @csrf

                        <button type="submit">Add</button>
                    </form>
{{-- //// --}}                     
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('title') Naujas Gyvūnas @endsection
 
