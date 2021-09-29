@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Companies List</div>

               <div class="card-body">
                <div class="paginate">{{$companys->links()}}</div>
                 {{--  --}}
                    <ul class="petforms-all">
                        @foreach ($companys as $company)
                        <li class="one-ownerform">
                            {{-- {{dd($company->getMember[0])}} --}}
                            <span class="one-form-data">
                                <div class="item-name"><b>{{$company->name}} </b></div>
                                <div class="little-txt txtblue"><i><small>Address: {{$company->address}}</small></i></div>
                            </span>
                            <span class="little-txt txtblue col-3 centr"><i><b>One of customers: </b>
                                &nbsp {{$company->getCustomer[0]->name ?? ''}} {{$company->getCustomer[0]->surname ?? 'not set'}}</i>
                           </span>
                            {{-- <div class="little-txt col-3 centr txtblue">
                                <i>capacity: {{str_replace(['{','}'], '', $company->capacity)}}</i>
                            </div> --}}

                            <div class="btns">
                                    <a href="{{route('company.edit',[$company])}}" class="btn edit">Edit</a>

                                <form method="POST" action="{{route('company.destroy', $company)}}">
                                    @csrf
                                    <button type="submit" class="btn danger">Delete</button>
                                </form>
                                <br>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                    <div class="paginate">{{$companys->links()}}</div>
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

@section('title') Companies List @endsection