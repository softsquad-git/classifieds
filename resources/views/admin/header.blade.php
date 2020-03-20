<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} @if(!empty($_c)) ({{ $_c }}) @endif</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ action($path) }}" class="btn btn-sm btn-outline-{{ $btn_class }}"><i class="fa fa-{{ $btn_icon }}"></i> {{ $btn_txt }}</a>
    </div>
</div>
