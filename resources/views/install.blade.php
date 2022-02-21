@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <h1 class="text-capitalize text-weight-bolder text-primary text-center header-title"> 
        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="logo" width="100">
        keywordTargetr</h1>
    <p class="text-capitalize text-center display-5">Installer</p>
</div>

<div class="container my-5">
    <form action="{{ route('installer.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <input type="url" class="form-control" name="app_url" placeholder="Site Url" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="db_name" placeholder="Database Name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="db_user" placeholder="Database User" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="password" class="form-control"  name="db_password" placeholder="Database Password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary float-right">
                    Install
                </button>
            </div>
        </div>
    </form>
</div>
@stop