@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Savininko duomenų redagavimas (id:{{$owner->id}})</div>

               <div class="card-body">
{{-- //// --}}
                    <form method="POST" action="{{route('owner.update',$owner)}}">
                        {{-- Name: <input type="text" name="owner_name" value="{{$owner->name}}"> --}}
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" class="form-control" name="owner_name" value="{{old('owner_name', $owner->name)}}">
                            <small class="form-text text-muted">Nurodykite vardą</small>
                        </div>

                        {{-- Surname: <input type="text" name="owner_surname" value="{{$owner->surname}}"> --}}
                        <div class="form-group">
                            <label>Pavardė</label>
                            <input type="text" class="form-control" name="owner_surname" value="{{old('owner_surname', $owner->surname)}}">
                            <small class="form-text text-muted">Nurodykite pavardę</small>
                        </div>

                        {{-- Contacts: <textarea name="owner_contacts">{{$owner->contacts}}</textarea> --}}
                        <div class="form-group">
                            <label>Kontaktinė informacija</label>
                            <textarea type="text" class="form-control" name="owner_contacts" id="summernote">{{old('owner_contacts', $owner->contacts)}}</textarea>
                            <small class="form-text text-muted">Nurodykite kontaktus</small>
                        </div>

                        {{-- <select name="pet_id">
                            @foreach ($pets as $pet)
                                <option value="{{$pet->id}}" @if($owner->id == $pet->owner_id) selected @endif>
                                    {{$pet->species}} {{$pet->name}}
                                </option>
                            @endforeach
                        </select> --}}

                            {{-- @foreach ($pets as $pet)
                                <div value="{{$pet->id}}">
                                    @if($owner->id == $pet->owner_id)
                                        OwnerId: {{$owner->id}} PetId: {{$pet->id}} {{$pet->species}} {{$pet->name}}
                                    @endif
                                </div>
                            @endforeach --}}

                        {{-- {{dd($owner->getPet([1])->$pets->id)}} --}}
                        {{-- @if($owner->getPet([0])) --}}
                        <label><i>Augintiniai</label>
                        <div class="form-group borderg">
                            
                            @foreach ($pets as $pet)
                                <div value="{{$pet->id}}">
                                    <small>
                                    @if($owner->id == $pet->owner_id)
                                        (Id:{{$pet->id}}) {{$pet->species}} {{$pet->name}}
                                    @endif
                                    </small>
                                </div>
                            @endforeach
                        </div></i>
                        {{-- @endif --}}
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

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>

@endsection

@section('title') Savininko redagavimas @endsection







 