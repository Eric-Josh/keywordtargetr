@extends('layouts.guest')

@section('content')
<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <a class="navbar-brand text-primary text-capitalize header-title" href="{{ route('search') }}">keyword targetr</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('list.show') }}">Saved List</a>
        </li>
    </ul>
</nav>

<div class="container mt-4">
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
                                            <div class="records">List: <span><b>{{ $list->name }}</b></span></div>
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
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody id="tbody">
                                                @forelse($keywords as $keyword)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input single-check"
                                                                    data-item="{{ $keyword->keyword }}"
                                                                >
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{ $keyword->keyword }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <form method="post" action="{{ route('keyword.search') }}" id="search-form">
                                                                    @csrf
                                                                    <input type="hidden" name="provider" value="{{ $keyword->provider }}">
                                                                    <input type="hidden" name="language" value="{{ $keyword->language_code }}">
                                                                    <input type="hidden" name="keyword" value="{{ $keyword->keyword }}">

                                                                    <button type="submit" class="btn btn-outline-primary text-xs shadow-sm keyword-search" 
                                                                        role="button"><i class="fas fa-search"></i> Keyword
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <a href="https://www.google.com/search?hl={{ $keyword->language_code }}&q={{ $keyword->keyword }}" 
                                                                    target="_blank" role="button" class="btn btn-sm btn-primary shadow-sm">
                                                                    <i class="fab fa-google fa-md"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <a href="https://www.youtube.com/results?hl={{ $keyword->language_code }}&search_query={{ $keyword->keyword }}" 
                                                                    target="_blank" role="button" class="btn btn-sm btn-danger shadow-sm">
                                                                    <i class="fab fa-youtube-square fa-md"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                {{__('No Saved Keywords!')}}
                                                @endforelse
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                            {{ $keywords->links() }}
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
        $('div span .inline-flex').hide()
    })
</script>
@stop