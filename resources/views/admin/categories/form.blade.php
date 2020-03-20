@extends('layouts.admin')
@section('title', 'Formularz kategorii')
@section('content')
    @include('admin.header', ['title' => 'Formularz kategorii', 'path' => 'Admin\Categories\CategoryController@items', 'btn_class' => 'danger', 'btn_icon' => 'ban', 'btn_txt' => 'Anuluj'])
    <form method="POST"
          action="{{ $item->id ? action('Admin\Categories\CategoryController@update', ['id' => $item->id]) : action('Admin\Categories\CategoryController@store')}}">
        @csrf
        <div class="form-group row">
            <div class="col-lg-4">
                <label for="name">Nazwa</label>
                <input type="text" name="name" value="{{ old('name') ?? $item->name }}" class="form-control" id="name" aria-describedby="nameTXT">
                <small id="nameTXT" class="form-text text-muted">Wpisz nazwę kategorii</small>
            </div>
            <div class="col-lg-4">
                <label for="icon_class">Ikona</label>
                <input type="text" name="icon_class" value="{{ old('icon_class') ?? $item->icon_class }}" class="form-control" id="icon_class" aria-describedby="iconCLASS">
                <small id="iconCLASS" class="form-text text-muted">Wpisz klasę CSS ikony</small>
            </div>
            <div class="col-lg-4">
                <label for="parent">Kategoria nadrzędna</label>
                <select class="custom-select" name="parent_id" aria-describedby="category">
                    <option value="0"{{ (old('parent_id')=='0' || $item->parent_id=='0') ? ' selected="selected"' : '' }}>-- wybierz kategorię</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('parent_id')==$category->id ||
                                    $item->parent_id==$category->id) ? ' selected="selected"' : ''
                                    }}>@if($category->parent_id != '0') | - - @endif {{ $category->name }}</option>
                    @endforeach
                </select>
                <small id="category" class="form-text text-muted">Wybierz kategorię</small>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Zapisz</button>
    </form>
@endsection
