@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 card-margin">
            <div class="card search-form">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="form-control" id="provider" name="provider">
                                            <option value="" disabled selected hidden>Provider</option>
                                            <option value="Google" {{ request()->query('provider') == 'Google' ? 'selected': ''}}>Google</option>
                                            <option value="Youtube" {{ request()->query('provider') == 'Youtube' ? 'selected': ''}}>Youtube</option>
                                            <option value="Amazon" {{ request()->query('provider') == 'Amazon' ? 'selected': ''}}>Amazon</option>
                                            <option value="Twitter" {{ request()->query('provider') == 'Twitter' ? 'selected': ''}}>Twitter</option>
                                        </select>
                                    </div>
                                    <input type="text" placeholder="Keyword" class="form-control" 
                                        id="keyword" name="keyword" value="{{ request()->query('q') }}">
                                    <div class="input-group-append">
                                        <select class="form-control dropdown-select" id="language" name="language">
                                            <option value="" disabled selected hidden>Language</option>
                                            @foreach($languages as $language)
                                            <option value="{{ $language->language_code }}" 
                                                {{ request()->query('language') == $language->language_code ? 'selected': ''}}>{{ $language->language_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select class="form-control dropdown-select" id="country" name="country">
                                            <option value="" disabled selected hidden>Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->country_code }}" 
                                                {{ request()->query('country') == $country->country_code ? 'selected': ''}}>{{ $country->country_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select class="form-control dropdown-select" id="amazon-language" name="amazon_language">
                                            <option value="" disabled selected hidden>Language</option>
                                            <option value="en_US" 
                                                {{ request()->query('alanguage') == 'en_US' ? 'selected': ''}}>English - EN
                                            </option>
                                            <option value="es_US" 
                                                {{ request()->query('alanguage') == 'es_US' ? 'selected': ''}}>Español - ES
                                            </option>
                                            <option value="zh_CN" 
                                                {{ request()->query('alanguage') == 'zh_CN' ? 'selected': ''}}>简体中文 - ZH
                                            </option>
                                            <option value="de_DE" 
                                                {{ request()->query('alanguage') == 'de_DE' ? 'selected': ''}}>Deutsch - DE
                                            </option>
                                            <option value="pt_BR" 
                                                {{ request()->query('alanguage') == 'pt_BR' ? 'selected': ''}}>Português - PT
                                            </option>
                                            <option value="zh_TW" 
                                                {{ request()->query('alanguage') == 'zh_TW' ? 'selected': ''}}>繁體中文 - ZH
                                            </option>
                                            <option value="ko_KR" 
                                                {{ request()->query('alanguage') == 'ko_KR' ? 'selected': ''}}>한국어 - KO
                                            </option>
                                            <option value="he_IL" 
                                                {{ request()->query('alanguage') == 'he_IL' ? 'selected': ''}}>עברית - HE
                                            </option>
                                            <option value="ar_AE" 
                                                {{ request()->query('alanguage') == 'he_IL' ? 'selected': ''}}> العربية- AR
                                            </option>
                                        </select>
                                        <select class="form-control dropdown-select" id="twit-lang" name="tlanguage">
                                            <option value="" disabled selected hidden>Language</option>
                                            @foreach($twitLangs as $twitLang)
                                            <option value="{{ $language->language_code }}" 
                                                {{ request()->query('tlanguage') == $twitLang->language_code ? 'selected': ''}}>{{ $twitLang->language_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group-append">
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
                    </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary">Actions</button>
                                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" 
                                                            data-toggle="dropdown">
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" role="button" id="csv-export">Export to CSV</a>
                                                            <a class="dropdown-item" role="button" id="xls-export">Export to Excel</a>
                                                            <a class="dropdown-item" role="button" id="cclipboard">Copy to Clipboard</a>
                                                            <a class="dropdown-item" role="button" id="save-list">Save to List</a>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#menu1">
                                                <b>Keyword Suggestions</b></a>
                                        </li>
                                        <li class="nav-item twit-tags">
                                            <a class="nav-link" data-toggle="tab" href="#menu2"><b>Hashtags</b></a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div id="menu1" class="container tab-pane active"><br>
                                            <div class="table-responsive">
                                                <table class="table widget-26" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Keywords </th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody"></tbody>
                                                </table>
                                            </div>
                                            <nav class="d-flex justify-content-center">
                                                <div class="mb-3" id="pagination-container1"></div>
                                            </nav>
                                        </div>
                                        <div id="menu2" class="container tab-pane fade"><br>    
                                            <div class="table-responsive">
                                                <table class="table widget-26">
                                                    <tbody id="tbody2"></tbody>
                                                </table>
                                            </div>
                                            <nav class="d-flex justify-content-center">
                                                <div class="mb-3" id="pagination-container"></div>
                                            </nav>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
			<span class="text-weight-bolder text-primary">Loading...</span><br>
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

<!-- The save Modal -->
<div class="modal fade" id="save-content">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="custom-save-header"></div>
            <!-- Modal body -->
            <div class="modal-body display-save-content">

                <div class="row default-list-view">
                    <div class="col-md-5 offset-md-1">
                    <button class="btn btn-outline-primary justify-center w-half  shadow-none create-list" data-createlist="1.1">
                        <i class="fas fa-list-ul"></i>
                        <span>{{ __('Create List') }}</span>
                    </button>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-outline-primary justify-center w-half  shadow-none select-list" data-selectlist="1.2">
                            <i class="fas fa-list-ul"></i>
                            <span>{{ __('Select List') }}</span>
                        </button>
                    </div>
                </div>
                <div class="row create-list-view">
                    <div class="col-md-12">
                        <h6><b>New List</b></h6>
                        <div class="input-group mb-3 ">
                        <input type="text" 
                            class="form-control block mt-1 border-gray-300 focus:border-indigo-300 
                                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm new-list-name" 
                            name="new_list_name" 
                            id="new-list-name"
                        >
                        <div class="input-group-append">
                            <button class="btn btn-outline-success justify-center w-half gap-2 shadow-none create-list-name">
                            {{__('Create')}}
                            </button>
                        </div>
                        </div>
                        <span id="list-error" style="color:red"></span>
                    </div>
                </div>
                <div class="row select-list-view">
                    <div class="col-md-12">
                        <h6><b>Select List</b></h6>
                        <select class="form-control  block mt-1  border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm select-list-name"  
                            name="select_list_name" 
                            id="select-list-name" >
                            <option value="" disabled selected hidden>Choose List</option>
                            @foreach($lists as $list)
                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row save-list-view">
                    <div class="col-md-12">
                        <h6 class="list-header"></h6><br>
                        <span class="notify"></span>
                        <button type="button" class="btn btn-outline-success mx-auto save-list">Save</button>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary btn-sm prev-step hide-out" style="float-left">Previous</button>
                <button type="button" class="btn btn-secondary btn-sm next-step hide-out" style="float-left">Next</button>
                <button type="button" class="btn btn-secondary btn-sm close-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/switch-provider.js') }}"></script>
<script>
    $(function(){
        $('body #table').tablesorter();
    })
</script>
@stop