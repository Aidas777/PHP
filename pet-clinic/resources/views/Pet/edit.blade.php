<form method="POST" action="{{route('pet.update',[$pet])}}">

    Name: <input type="text" name="pet_name" value="{{$pet->name}}">
    Specie: <input type="text" name="pet_species" value="{{$pet->species}}">
    Birth date: <input type="text" name="pet_bdate" value="{{$pet->birth_date}}">
    Document: <input type="text" name="pet_document" value="{{$pet->document}}">
    History: <textarea name="pet_history">{{$pet->history}}</textarea>

    <select name="owner_id">
        @foreach ($owners as $owner)
            <option value="{{$owner->id}}" @if($owner->id == $pet->owner_id) selected @endif>
                {{$owner->name}} {{$owner->surname}}
            </option>
        @endforeach
    </select>

    <select name="doctor_id">
        @foreach ($doctors as $doctor)
            <option value="{{$doctor->id}}" @if($doctor->id == $pet->doctor_id) selected @endif>
                {{$doctor->name}} {{$doctor->surname}}
            </option>
        @endforeach
    </select>


    @csrf
    <button type="submit">EDIT</button>
</form>
 

