@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Company</div>

               <div class="card-body">
                    {{--  --}}
                    <form method="POST" action="{{route('company.update',$company)}}">

                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" value = "{{old('company_name', $company->name)}}">
                            <small class="form-text text-muted">Enter company name</small>
                        </div>

                        <div class="form-group">
                            <label>Company Address</label>
                            <input type="text" name="company_address" class="form-control" value = "{{old('company_address',$company->address)}}">
                            <small class="form-text text-muted">Enter company address</small>
                        </div>

                        {{-- <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="company_code" class="form-control" value="{{old('company_code', $company->code)}}">
                            <small class="form-text text-muted">Enter company code</small>
                        </div> --}}

                        @csrf
                        <div class="btn-center">
                            {{-- <button type="submit" class="btn confirm">back</button> --}}
                            <button type="submit" class="btn confirm">Update</button>
                        </div>
                    </form>
                    {{--  --}}
               </div>
           </div>
       </div>
   </div>
</div>

@endsection

@section('title') Edit Company @endsection