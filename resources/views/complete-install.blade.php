@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <h1 class="text-capitalize text-weight-bolder text-primary text-center header-title"> 
        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="logo" width="100">
        keywordTargetr</h1>
    <p class="text-capitalize text-center display-5">Installation Completed</p>
</div>

<div class="container mt-5">
    <form action="{{ route('seed.db') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <center>
                <button type="submit" class="btn btn-primary btn-lg">
                    Visit Site
                </button>
                </center>
            </div>
        </div>
    </form>
</div>
@stop