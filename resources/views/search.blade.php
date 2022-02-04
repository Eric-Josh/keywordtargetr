@extends('layouts.guest')

@section('content')
<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <a class="navbar-brand text-primary text-capitalize header-title" href="#">keyword targetr</a>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 card-margin">
            <div class="card search-form">
                <div class="card-body p-0">
                    <!-- <form method="post" action="{{ route('keyword.search') }}" id="search-form"> -->
                        <div class="row">
                            <div class="col-12">
                                <div class="row no-gutters">
                                    <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                                        <select class="form-control" id="provider" name="provider">
                                            <option value="" disabled selected hidden>Provider</option>
                                            <option value="1" {{ request()->query('provider') == '1' ? 'selected': ''}}>Google</option>
                                            <option value="2" {{ request()->query('provider') == '2' ? 'selected': ''}}>Youtube</option>
                                            <option value="3" {{ request()->query('provider') == '3' ? 'selected': ''}}>Amazon</option>
                                            <option value="4" {{ request()->query('provider') == '4' ? 'selected': ''}}>Twitter</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                                        <input type="text" placeholder="Keyword" class="form-control" 
                                            id="keyword" name="keyword" value="{{ request()->query('q') }}">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                        <select class="form-control" id="language" name="language">
                                            <option value="" disabled selected hidden>Language</option>
                                            @foreach($languages as $language)
                                            <option value="{{ $language->language_code }}" 
                                                {{ request()->query('language') == $language->language_code ? 'selected': ''}}>{{ $language->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                        <button type="button" class="btn btn-base" id="search">
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
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="records">Showing: <span id="total-arr"></span> result</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="result-actions">
                                            <div class="result-views">
                                                    <div class="form-check">
                                                        <label class="form-check-label"> 
                                                            <input type="checkbox" class="form-check-input bulk-check" id="bulk-check"> All
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="result-sorting">
                                                    <span>Action:</span>
                                                    <select class="form-control border-0" id="actions">
                                                        <option value="" >Select</option>
                                                        <option value="1">Export to CSV</option>
                                                        <option value="2">Export to Excel</option>
                                                        <option value="3">Copy to Clipboard</option>
                                                        <option value="4">Save to List</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody id="tbody"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="d-flex justify-content-center">
                        <div class="mb-3" id="pagination-container"></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Loading Modal -->
<div class="modal" id="loadModal">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
		<!-- Modal body -->
		<div class="modal-body text-center">
			<span class="text-weight-bolder text-primary">Loading...</span>
			<img src="{{ asset('img/Loading_progress.gif') }}" class="mx-auto d-block">
		</div>
    </div>
  </div>
</div>
<!-- The error notice Modal -->
<div class="modal" id="noticeModal">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
		<!-- Modal body -->
		<div class="modal-body text-center notice-body"></div>
        <div class="modal-footer">
            <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    
  </div>
</div>
<script src="{{ asset('js/switch-provider.js') }}"></script>
<script>
    $(function(){
        $('.keyword-search').click(function(){
        console.log('working')
        let keyitem = $(this).data('item')
        $('#keyword').val(keyitem)
    })
    })
</script>
@stop