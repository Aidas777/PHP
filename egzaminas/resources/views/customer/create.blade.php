@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Customer</div>

               <div class="card-body">
{{--  --}}
                    <form method="POST" action="{{route('customer.store')}}">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="customer_name" class="form-control" value = "{{old('customer_name')}}">
                            <small class="form-text text-muted">Enter customers name</small>
                        </div>

                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="customer_surname" class="form-control" value = "{{old('customer_surname')}}">
                            <small class="form-text text-muted">Enter customers surname</small>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="customer_phone" class="form-control" value = "{{old('customer_phone')}}">
                            <small class="form-text text-muted">Enter customers phone</small>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="customer_email" class="form-control" value = "{{old('customer_email')}}">
                            <small class="form-text text-muted">Enter customers email</small>
                        </div>

                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="customer_comment" class="form-control" id="summernote">{{old('customer_comment')}}</textarea>
                            <small class="form-text text-muted">Enter comment about customer</small>
                        </div>

                        <div class="form-group">
                            {{-- <label>Company</label> --}}
                            <select name="company_id" class="form-control">
                                <option value="0" disabled selected>Select Company</option>
                                @foreach ($companys as $company)
                                    <option value="{{$company->id}}" @if(old('company_id') ==  $company->id) selected @endif>
                                        {{$company->name}} {{$company->address}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Set customer to company</small>
                        </div>
                        @csrf
                        <div class="btn-center">
                            <button type="submit" class="btn addbtn">Add</button>
                        </div>
                    </form>
{{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>

@endsection

@section('title') New Customer @endsection