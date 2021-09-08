<form method="POST" action="{{route('doctor.update',$doctor)}}">
    Name: <input type="text" name="doctor_name" value="{{$doctor->name}}">
    Surname: <input type="text" name="doctor_surname" value="{{$doctor->surname}}">
    Category: <input type="text" name="doctor_category" value="{{$doctor->category}}">
    @csrf
    <button type="submit">Edit</button>
 </form>
 