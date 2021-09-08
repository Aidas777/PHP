<form method="POST" action="{{route('pet.store')}}">
    Name: <input type="text" name="pet_name">
    Specie: <input type="text" name="pet_species">
    Birth date: <input type="text" name="pet_bdate">
    Document: <input type="text" name="pet_document">
    History: <textarea name="pet_history"></textarea>

    <select name="doctor_id">
        @foreach ($doctors as $doctor)
            <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->surname}}</option>
        @endforeach
    </select>

    <select name="owner_id">
        @foreach ($owners as $owner)
            <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>
        @endforeach
    </select>
 

    @csrf

    <button type="submit">Add</button>
 </form>


{{-- 

doctor_id : int(11)
owner_id : int(11) --}}
