
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Welcome</div>

              <div class="card-body">
                  Welcome to MedApp<br/>
                  <a href={{ route('about') }}>About us</a>
                  <br />
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
