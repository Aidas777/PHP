<form method="POST" action="{{route('doctor.store')}}">
    Vardas: <input type="text" name="doctor_name">
    Pavardė: <input type="text" name="doctor_surname">
    Kategorija: <input type="text" name="doctor_category">
    @csrf
    <button type="submit">ADD</button>
 </form>