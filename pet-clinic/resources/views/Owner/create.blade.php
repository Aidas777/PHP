@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujas Savininkas</div>

               <div class="card-body">




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





               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Naujas Savininkas @endsection






