@extends('layouts.admin')
@section('title', 'Lista kategorii')
@section('content')
    @include('admin.header', ['title' => 'Kategorie', 'path' => 'Admin\Categories\CategoryController@create',
                'btn_class' => 'secondary', 'btn_icon' => 'plus', 'btn_txt' => 'Dodaj', '_c' => $data->count()])
    <div clas="content-admin">
        <ul class="list-group">
            @foreach($data as $row)
                <li @if($row->parent_id != 0) style="margin-left: 50px;!important;" @endif class="list-group-item">{{ $row->name }}
                    <span class="float-right">
                        <a href="{{ action('Admin\Categories\CategoryController@edit', ['id' => $row->id]) }}" class="fa fa-pencil warning_c icon-list"></a>
                        <a href="{{ action('Admin\Categories\CategoryController@delete', ['id' => $row->id]) }}" class="fa fa-trash delete_c icon-list"></a>
                    </span>
                </li>
            @endforeach
        </ul>
        <div style="height: 50px;"></div>
        {{ $data->render() }}
    </div>
@endsection
