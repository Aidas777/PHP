@foreach ($doctors as $doctor)
  <a href="{{route('doctor.edit',[$doctor])}}">{{$doctor->id}} {{$doctor->name}} {{$doctor->surname}} {{$doctor->category}}</a>
  <form method="POST" action="{{route('doctor.destroy', $doctor)}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach

