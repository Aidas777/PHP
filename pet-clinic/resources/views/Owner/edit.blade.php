<form method="POST" action="{{route('owner.update',$owner)}}">
    Name: <input type="text" name="owner_name" value="{{$owner->name}}">
    Surname: <input type="text" name="owner_surname" value="{{$owner->surname}}">
    {{-- Contacts: <input type="text" name="owner_contacts" value="{{$owner->contacts}}"> --}}
    Contacts: <textarea name="owner_contacts">{{$owner->contacts}}</textarea>

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

    @foreach ($pets as $pet)
        <div value="{{$pet->id}}">
            @if($owner->id == $pet->owner_id)
                Pet-Id: {{$pet->id}} {{$pet->species}} {{$pet->name}}
            @endif
        </div>
    @endforeach
    
    @csrf
    <button type="submit">Edit</button>
 </form>






 