<form method="POST" action="{{route('owner.store')}}">
    Name: <input type="text" name="owner_name">
    Surname: <input type="text" name="owner_surname">
    Contacts: <textarea name="owner_contacts"></textarea>

    
    {{-- <select name="author_id">
        @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
        @endforeach
    </select> --}}
    @csrf
    <button type="submit">Add</button>
 </form>





