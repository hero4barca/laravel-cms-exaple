@extends('layouts.base')


@section('content')
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8 mx-auto">
          <h1 class="my-4 text-center"> Company Employess CMS </h1>

          @if (count($companies) > 1)
    
              @foreach ($companies as $company)
              <div class="card mb-4 border border-dark" >
                <img  class="card-img-top img-responsive" src=" {!! !empty($company->logo) ? '/uploads/companies/' . $company->logo :  'http://placehold.it/200x75' !!} " alt="Card image cap">
                <div class="card-body">
                  <p class="card-title text-center">Comapny Name: {{ $company->user->name }}</p>
                  <p class="card-title text-center">Company Website: {{ $company->url }}</p>
                  <p class="card-title text-center">Company Email: {{ $company->user->email }}</p>
                  
              </div>
              </div>
              @endforeach

              <span> 

                {{ $companies->links() }}
                              

              </span>

          @else
              
            <p class="text-center"> No Company data available</p>

          @endif

          
        <!-- TODO: pagination links -->
        </div>
      </div>
    </div>
    @endsection