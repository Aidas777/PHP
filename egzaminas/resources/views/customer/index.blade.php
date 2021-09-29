@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{-- down --}}
                    <h3>Customers List</h3>
                    <form action="{{route('customer.index')}}" method="get">
                    <fieldset>
                        <legend>Sort</legend>
                        <div class="block">
                                <button type="submit" class="btn btn-sort" name="sort" value="name">by Name</button>
                                <button type="submit" class="btn btn-sort" name="sort" value="phone">by Phone</button>
                        </div>
                        <div class="block">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" 
                                    name="sort_dir" id="_1" 
                                    value="asc" @if('desc' != $sortDirection) checked @endif>
                                    <label class="form-check-label" for="_1">
                                    Ascending
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio"
                                        name="sort_dir" id="_2"
                                        value="desc" @if('desc'== $sortDirection) checked @endif>
                                    <label class="form-check-label" for="_2">
                                        Descending
                                    </label>
                                </div>
                        </div>
                        <div class="block">
                            <a href="{{route('customer.index')}}" class="btn danger">Reset</a>
                        </div>
                        </fieldset>
                    </form>

                    {{--  --}}
                    <form action="{{route('customer.index')}}" method="get">
                       <fieldset>
                           <legend>Filter</legend>
                           <div class="block">
                               {{-- <div class="form-group"> --}}
                                   <select class="form-control" name="company_id">
                                       <option value="0" disabled selected>Select Company</option>
                                       @foreach ($companys as $company)
                                           <option value="{{$company->id}}" @if($company_id == $company->id) selected @endif>{{$company->name}}</option>
                                       @endforeach
                                   </select>
                                   <small class="form-text text-muted"><i>Select company from the list.</i></small>
                               {{-- </div> --}}
                           </div>

                           <div class="block">
                               <button type="submit" class="btn btn-sort" name="filter" value="company">Filter</button>
                               <a href="{{route('customer.index')}}" class="btn danger">Reset</a>
                           </div>
   
   
                   
                       </fieldset>
                    </form>
                 {{--  --}}


                </div>
               {{-- up --}}

                <div class="card-body">
                    <div class="paginate">{{$customers->links()}}</div>
                 {{--  --}}
                    <ul class="petforms-all">
                        @foreach ($customers as $customer)
                        <li class="one-ownerform">
                            <div class="placeImg">
                                @if($customer->photo)
                                <img src="{{$customer->photo}}" alt="{{$customer->name}}">
                                @else
                                <img src="{{asset('img/no-image.jpg')}}" alt="{{$customer->name}}">
                                @endif
                            </div>
                            <div class="centr">
                                <div class="item-name"><b>{{$customer->name}} {{$customer->surname}}</b></div>
                                <span class="little-txt txtblue"><i><small>Co:</small></i>
                                    &nbsp <i class="short20"><b>{{$customer->getCompany->name ?? 'not set'}}</b></i>
                                </span>
                            </div>

                            <span class="one-form-data-27">
                                {{-- <div class="item-name"><b>{{$customer->weight}} Kg</b></div> --}}
                                <div class="little-txt"><i>{{$customer->phone}}</i></div>
                                <div class="little-txt txtblue"><i><small>Comment:</small>
                                     &nbsp <small><b>{!!$customer->comment ?? 'not set'!!}</b></small></i>
                                </div>
                                {{-- <div class="little-txt txtblue"><i><b>Company: </b>
                                    &nbsp <small>{{$customer->getCompany->code ?? ''}} ({{$customer->getCompany->town ?? 'not set'}})</small></i>
                               </div> --}}
                            </span>

                            <div class="btns">
                                <div>
                                    {{-- <a href="{{route('customer.show',[$customer])}}" class="btn show">Show</a> --}}
                                    <a href="{{route('customer.edit',[$customer])}}" class="btn edit">Edit</a>
                                        {{-- {{$customer->name}} {{$customer->surname}}
                                        {{$customer->getCompany->title}}</a> --}}
                                </div>
                                <form method="POST" action="{{route('customer.destroy', [$customer])}}">
                                    @csrf
                                    <button type="submit" class="btn danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="paginate">{{$customers->links()}}</div>
                 {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Customers List @endsection