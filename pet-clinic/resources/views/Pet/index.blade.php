@foreach ($pets as $pet)
  <a href="{{route('pet.edit',[$pet])}}">{{$pet->name}} {{$pet->species}} <small>/Owner: {{$pet->getOwner->name}} {{$pet->getOwner->surname}}
  /Doctor: {{$pet->getDoctor->name}} {{$pet->getDoctor->surname}}</small></a>
  <form method="POST" action="{{route('pet.destroy', [$pet])}}">
   @csrf
   <button type="submit">Delete</button>
  </form>
  <br>
@endforeach

