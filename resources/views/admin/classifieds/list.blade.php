@extends('layouts.admin')
@section('title', 'Lista ogłoszeń')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lista ogłoszeń ({{ $data->count() }})
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ action('Admin\Classifieds\ClassifiedsController@items') }}"
               class="btn btn-sm btn-outline-secondary {{ $status == null ? 'active' : '' }}"><i
                    class="fa fa-newspaper"></i> Wszystkie</a>
            <a href="{{ action('Admin\Classifieds\ClassifiedsController@items') }}?status={{ Status::CLASSIFIEDS_NEW }}"
               class="btn btn-sm btn-outline-secondary ml-1 {{ $status == Status::CLASSIFIEDS_NEW ? 'active' : '' }}"><i
                    class="fa fa-plus-circle"></i> Nowe</a>
            <a href="{{ action('Admin\Classifieds\ClassifiedsController@items') }}?status={{ Status::CLASSIFIEDS_PUBLISHED }}"
               class="btn btn-sm btn-outline-secondary ml-1 {{ $status == Status::CLASSIFIEDS_PUBLISHED ? 'active' : '' }}"><i
                    class="fa fa-check"></i> Aktywne</a>
            <a href="{{ action('Admin\Classifieds\ClassifiedsController@items') }}?status={{ Status::CLASSIFIEDS_ARCHIVE }}"
               class="btn btn-sm btn-outline-secondary ml-1 {{ $status == Status::CLASSIFIEDS_ARCHIVE ? 'active' : '' }}"><i
                    class="fa fa-archive"></i> Archiwum</a>
            <a href="{{ action('Admin\Classifieds\ClassifiedsController@items') }}?status={{ Status::CLASSIFIEDS_LOCKED }}"
               class="btn btn-sm btn-outline-secondary ml-1 {{ $status == Status::CLASSIFIEDS_LOCKED ? 'active' : '' }}"><i
                    class="fa fa-ban"></i> Zablokowane</a>
            <a href="{{ action('Admin\Classifieds\ClassifiedsController@items') }}?status={{ Status::CLASSIFIEDS_PROMO }}"
               class="btn btn-sm btn-outline-secondary ml-1 {{ $status == Status::CLASSIFIEDS_PROMO ? 'active' : '' }}"><i
                    class="fa fa-money-bill-alt"></i> Promowane</a>
        </div>
    </div>

    <div class="content-admin">
        @if($data->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tytuł</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Data dodania</th>
                    <th scope="col">Typ</th>
                    <th scope="col">Akcja</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>@switch($row->type) @case(\App\Helpers\ClassifiedsType::AD)
                            Ogłoszenie @break @case(\App\Helpers\ClassifiedsType::PRODUCT)
                            Produkt @break @case(\App\Helpers\ClassifiedsType::AUCTION)
                            Aukcja @break @case(\App\Helpers\ClassifiedsType::AUCTION_PRODUCT) Aukcja -
                            Produkt @break @endswitch</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary text-center w-1"><i
                                    class="fa fa-eye icon-list"></i></button>

                            @if($row->status == \App\Helpers\Status::CLASSIFIEDS_NEW)
                                <button id="accept-{{ $row->id }}"
                                        class="btn btn-sm btn-outline-success text-center w-1 accept-classifieds"
                                        value="{{ $row->id }}"><i
                                        class="fa fa-check icon-list"></i></button>
                            @endif
                            <button id="ban-{{ $row->id }}" value="{{ $row->id }}" class="btn btn-sm btn-outline-danger text-center w-1"><i
                                    class="fa fa-ban icon-list"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="height: 50px;"></div>
            {{ $data->render() }}
        @else
            <p>
                Brak danych do wyświetlenia
            </p>
        @endif
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/classifieds.js') }}"></script>
@endsection

