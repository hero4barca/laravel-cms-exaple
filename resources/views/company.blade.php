@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-10 mx-auto">
     <img class="img-fluid rounded" src=" {!! !empty($company->logo) ? '/uploads/companies/' . $company->logo :  'http://placehold.it/450x200' !!} " alt="company logo image">
      <hr>
      <h3 class="mt-4"> Company Name: {{ $company->user->name }}  </h3>
      <p> Company Url: {{ $company->url }} </p>
      <p> Company Email: {{ $company->user->email }} </p>
      <hr>
      
      <p class="lead">Company Employees</p>

       Company employee detail block
      @foreach ($company->employees as $employee)
          <div class="card mb-4">
           
            <div class="card-body">
              <p class="card-title text-center">Employee Name: {{ $employee->user->name }}</p>
              <p class="card-title text-center">Employee Email: {{ $employee->user->email }}</p>
              <span class="text-center"> 
              <a  href="/companies/{{ $company->id }}" class="btn btn-primary">Company page</a>
            </span> 
          </div>
        @endforeach
        
    </div>
  </div>
</div>
@endsection