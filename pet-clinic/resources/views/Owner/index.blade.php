@foreach ($owners as $owner)
{{-- {{dd($owner->id, $owner->getPet[1]->species)}} --}}
  <a href="{{route('owner.edit',[$owner])}}">{{$owner->name}} {{$owner->surname}} {{$owner->getPet[0]->species ?? ''}} {{$owner->getPet[0]->name ?? ''}}</a>
  <form method="POST" action="{{route('owner.destroy', [$owner])}}">
   @csrf
   <button type="submit">Delete</button>
  </form>
  <br>
@endforeach


{{-- @foreach ($books as $book)
  <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>
  <form method="POST" action="{{route('book.destroy', [$book])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach --}}




