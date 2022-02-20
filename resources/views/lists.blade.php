@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 card-margin">
            <div class="card search-form">
                <div class="card-body p-0">
                    <form method="GET" action="{{ route('list.show') }}" id="search-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row no-gutters">
                                    <div class="col-lg-11 col-md-6 col-sm-12 p-0">
                                        <input type="text" placeholder="Search List Name" class="form-control" 
                                            name="list_search" value="{{ request()->query('list_search') }}">
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                        <button type="submit" class="btn btn-base" id="search">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                                stroke-linejoin="round" class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-primary" id="new-list" >New List</button>
        </div>
    </div>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
        </div>
    </div>
</div>


<div class="container mt-2">
    <div class="row">
        @forelse($lists as $list)
        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <b>{{ $list->name }} 
                    <span class="float-right">
                        <div class="dropdown dropright">
                            <a href="#" data-toggle="dropdown" >
                                <i class="fas fa-ellipsis-h list-option"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('list.keyword', $list->id) }}">
                                    View List
                                </a>
                                <a class="dropdown-item rename" role="button" 
                                    data-listname="{{$list->name}}" data-updateurl="{{ route('list.update', $list->id) }}">
                                    Rename List
                                </a>
                                <a class="dropdown-item destroy-btn" role="button" 
                                    data-id="{{$list->id}}" data-deleteurl="{{ route('list.delete', $list->id) }}">Delete List</a>
                            </div>
                        </div>  
                    </span>
                </b><br>
                <span class="text-sm">Keyword(s) - {{ $list->total }}</span>
            </div>
        </div>
        @empty
        {{ __('No List Available! ') }}
        @endforelse
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="formModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h6 class="modal-title title"></h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post" id="newForm">
                    @csrf
                    <span id="create-url" data-createurl="{{ route('list.post') }}"></span>
                    <span id="method"></span>
                    <div class="form-group input-field" >
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="list-name" name="name" placeholder="List Name">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-success save">Save</button>
                            </div>
                        </div>
                    </div>
                    <span class="delete-notice">Do you want to continue?&nbsp;&nbsp;</span>
                    <button type="submit" class="btn btn-outline-danger destroy">Delete</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
    $('#new-list').click(function(){
        $('.title').html('<b>New List</b>').css('color','#fff')
        $('#list-name').val('')
        $('#newForm').attr('action', $('#create-url').data('createurl'))
        $('#method').html('')
        $('.save').show()
        $('.destroy').hide()
        $('.input-field').show()
        $('.delete-notice').hide()
        $('#formModal').modal({backdrop:'static', keyboard:false, show:true})
    })
    $('.rename').click(function(){
        $('.title').html('<b>Update List</b>').css('color','#fff')
        $('#list-name').val($(this).data('listname'))
        $('#newForm').attr('action', $(this).data('updateurl'))
        $('#method').html('<input type="hidden" name="_method" value="PUT">')
        $('.save').show()
        $('.destroy').hide()
        $('.input-field').show()
        $('.delete-notice').hide()
        $('#formModal').modal({backdrop:'static', keyboard:false, show:true})
    })
    $('.destroy-btn').click(function(){
        $('.title').html('<b>Delete List</b>').css('color','#fff')
        $('#list-name').val($(this).data('listname'))
        $('#newForm').attr('action', $(this).data('deleteurl'))
        $('#method').html('<input type="hidden" name="_method" value="DELETE">')
        $('.save').hide()
        $('.destroy').show()
        $('.input-field').hide()
        $('.delete-notice').show()
        $('#formModal').modal({backdrop:'static', keyboard:false, show:true})
    })
})
</script>
@stop