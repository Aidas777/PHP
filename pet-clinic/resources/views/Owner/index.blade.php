@foreach ($owners as $owner)
  <a href="{{route('owner.edit',[$owner])}}">{{$owner->name}} {{$owner->surname}}</a>
  <form method="POST" action="{{route('owner.destroy', [$owner])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach


