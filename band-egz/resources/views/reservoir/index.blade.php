@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Reservoirs List</div>

               <div class="card-body">
                <div class="paginate">{{$reservoirs->links()}}</div>
                 {{--  --}}
                    <ul class="petforms-all">
                        @foreach ($reservoirs as $reservoir)
                        <li class="one-ownerform">
                            {{-- {{dd($reservoir->getMember[0])}} --}}
                            <span class="one-form-data">
                                <div class="item-name"><b>{{$reservoir->title}} </b><i><small> Area: {{$reservoir->area}}</small></i></div>
                                <div class="little-txt txtblue"><i><b>Set to: </b>
                                    &nbsp {{$reservoir->getMember[0]->name ?? ''}} {{$reservoir->getMember[0]->surname ?? 'not set'}}</i>
                               </div>
                            </span>
                            <div class="little-txt col-3 centr txtblue">
                                <i>{{str_replace(['{','}'], '', $reservoir->about)}}</i>
                            </div>

                            <div class="btns">
                                    <a href="{{route('reservoir.edit',[$reservoir])}}" class="btn edit">Edit</a>

                                <form method="POST" action="{{route('reservoir.destroy', $reservoir)}}">
                                    @csrf
                                    <button type="submit" class="btn danger">Delete</button>
                                </form>
                                <br>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                    <div class="paginate">{{$reservoirs->links()}}</div>
                 {{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>
{{-- <script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script> --}}

@endsection

@section('title') Reservoirs List @endsection
