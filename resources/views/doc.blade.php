<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #000;
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        * {
            box-sizing: border-box;
        }

        code {
            background: #ddd;
            display: block;
            padding: 10px;
        }

        li.updated {
            background: rgba(0, 0, 0, 0.3);
            padding: 10px;
            border: 2px dashed #333;
        }

        pre {
            background: #252525;
            display: block;
            padding: 10px;
            max-height: 300px;
            overflow: auto;
        }
    </style>
</head>
<body>
<ol>
    <li>
        <h2>Autoryzacja (logowanie)</h2>
        <ul>
            <li>route: {{ action('Auth\AuthController@login') }}</li>
            <li>method: POST</li>
            <li>
                <strong>params:</strong> (wszystkie pola wymagane)
                <ul>
                    <li>email</li>
                    <li>password</li>
                </ul>
            </li>
            <li>
                <strong>response:</strong>
                <pre id="auth">
                    <script>
                        var myData = {
                            "access_token": "eyJ0eXAiOiJKV1QiLfCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9maW5odWIuZGV2c2FmaS5wbFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3NDE1NTk2NCwiZXhwIjoxNTc0MTU5NTY0LCJuYmYiOjE1NzQxNTU5NjQsImp0aSI6IllMQnRpcmZxUWN1Nmc0dngiLCJzdWIiOjQsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJ1c2VyIjpbXX0.isKk8EF41W9FTYTgFHEV-S_eyXWoCvgWuP4gVIPwDUI",
                            "token_type": "bearer",
                            "expires_in": 3600
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('auth').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Autoryzacja (rejestracja)</h2>
        <ul>
            <li>route: {{ action('Auth\AuthController@register') }}</li>
            <li>method: POST</li>
            <li>
                <strong>params:</strong>
                <ul>
                    <li><b>pola wymagane</b></li>
                    <li>name</li>
                    <li>last_name</li>
                    <li>email</li>
                    <li>password</li>
                    <li>birthday</li>
                    <li><b>pola opcjonalne</b></li>
                    <li>sex</li>
                    <li>avatar_src</li>
                    <li>phone</li>
                    <li>city</li>
                    <li>address</li>
                    <li>post_code</li>
                </ul>
            </li>
            <li>
                <p>
                    Po udanej rejestracji użytkownik zostaje przekierowany na stronę logowania
                </p>
                <strong>response:</strong>
                <pre id="register">
                    <script>
                        var myData = {
                            "success": 1,
                            "user": {
                                "name": "Soft",
                                "last_name": "Squad",
                                "email": "test@example.pl",
                                "birthday": "2000-08-30",
                                "updated_at": "2020-03-17T14:34:53.000000Z",
                                "created_at": "2020-03-17T14:34:53.000000Z",
                                "id": 1
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('register').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Autoryzacja (aktywacja konta)</h2>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('Auth\AuthController@activate') }}</li>
            <li>method: POST</li>
            <li>
                <strong>params:</strong>
                <ul>
                    <li><b>pola wymagane</b></li>
                    <li>key</li>
                </ul>
            </li>
            <li>
                <p>
                    Endpoint zwraca success: 1 kiedy aktywacja przebiegnie pomyślnie <br/>
                    kiedy zostanie zwrócony success: 0 oznacza to że podano nieprawidłowy kod lub użytkownik ma już aktywne konto
                </p>
                <strong>response:</strong>
                <pre id="activate">
                    <script>
                        var myData = {
                            "success": 1,
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('activate').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Zalogowany użytkownik</h2>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('Auth\AuthController@me') }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Zwraca dane aktualnie zalogowanego użytkownika
                </p>
                <strong>response:</strong>
                <pre id="user-logged">
                    <script>
                        var myData = {
                            "data": {
                                "id": 1,
                                "name": "Soft",
                                "last_name": "Squad",
                                "email": "test@example.pl",
                                "birthday": "2000-08-30",
                                "activated": 1,
                                "status": "ACTIVATED",
                                "created_at": "2020-03-17T16:22:28.000000Z",
                                "updated_at": "2020-03-17T16:24:27.000000Z",
                                "s": {
                                    "id": 1,
                                    "user_id": 1,
                                    "sex": null,
                                    "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                    "phone": null,
                                    "city": null,
                                    "address": null,
                                    "post_code": null,
                                    "created_at": "2020-03-17T16:22:28.000000Z",
                                    "updated_at": "2020-03-17T16:22:28.000000Z"
                                }
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('user-logged').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Panel użytkownika - dodawanie / edycja ogłoszenia</h2>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@store') }} - Dodaj</li>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@update', ['id' => 'ID']) }} - Edytuj</li>
            <li>method: POST</li>
            <li>
                <strong>params:</strong>
                <ul>
                    <li><b>pola wymagane</b></li>
                    <li>category_id</li>
                    <li>title</li>
                    <li>content</li>
                    <li>contact_person</li>
                    <li>email</li>
                    <li>location</li>
                    <li>type (AUCTION | PRODUCT | AD | AUCTION_PRODUCT)</li>
                    <li><b>----</b></li>
                    <li><b>jeśli typ to aukcja</b></li>
                    <li>starting_price</li>
                    <li>end_time</li>
                    <li><b>jeśli typ to produkt lub ogłoszenie</b></li>
                    <li>price</li>
                    <li><b>jeśli typ to aukcjo produkt</b></li>
                    <li>starting_price</li>
                    <li>end_time</li>
                    <li>price</li>
                    <li><b>----</b></li>
                    <li>number_phone</li>
                    <li>is_negotiation</li>
                    <li>is_reservation</li>
                    <li>quantity</li>
                    <li>state (NEW | USED | EXHIBITION | DAMAGED)</li>
                </ul>
            </li>
            <li>
                <p>
                    Zwraca status oraz podstawowe dane dodanego ogłoszenia
                </p>
                <strong>response:</strong>
                <pre id="classifieds-store">
                    <script>
                        var myData = {
                            "success": 1,
                            "item": {
                                "email": "test@example.pl",
                                "user_id": 1,
                                "category_id": "1",
                                "title": "First",
                                "location": "TEST",
                                "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                "contact_person": "Michał",
                                "type": "AD",
                                "is_negotiation": "1",
                                "is_reservation": "1",
                                "state": "USED",
                                "status": "NEW",
                                "updated_at": "2020-03-18T10:52:46.000000Z",
                                "created_at": "2020-03-18T10:52:46.000000Z",
                                "id": 1
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('classifieds-store').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Panel użytkownika - lista ogłoszeń</h2>
        <span><b>Wszędzie gdzie w panelu użytkownika zwracana jest lista ogłoszeń mamy możliwość filtrowania (wyszukiwania)<br/>
            po kategorii i tytule: | ...?category=CATEGORY_ID&title=Test | </b></span>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@items') }} - Aktywne ogłoszenia</li>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@itemsArchive') }} - Ogłoszenia w archiwum</li>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@itemsWaiting') }} - Oczekujące ogłoszenia</li>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@itemsLocked') }} - Zablokowane ogłoszenia</li>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@itemsPromo') }} - Ogłoszenia promowane</li>
            <li>method: POST</li>
            <li>
                <p>
                    Zwraca listę ogłoszeń
                </p>
                <strong>response:</strong>
                <pre id="classifieds">
                    <script>
                        var myData = {
                            "data": [
                                {
                                    "id": 2,
                                    "user_id": 1,
                                    "category_id": 1,
                                    "title": "First",
                                    "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                    "contact_person": "Michał",
                                    "email": "michallosak@gmail.com",
                                    "type": "AD",
                                    "starting_price": null,
                                    "price": null,
                                    "end_time": null,
                                    "number_phone": null,
                                    "is_negotiation": 1,
                                    "is_reservation": 1,
                                    "quantity": null,
                                    "state": "USED",
                                    "views": 0,
                                    "status": "PUBLISHED",
                                    "created_at": "2020-03-18T13:51:46.000000Z",
                                    "updated_at": "2020-03-18T13:51:46.000000Z",
                                    "image": "http://127.0.0.1:8000/assets/data/classifieds/df.png",
                                    "images": [],
                                    "user": {
                                        "id": 1,
                                        "name": "Soft",
                                        "last_name": "Squad",
                                        "email": "michallosak@gmail.com",
                                        "birthday": "2000-08-30",
                                        "activated": 0,
                                        "status": "NEW",
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z",
                                        "s": {
                                            "id": 1,
                                            "user_id": 1,
                                            "sex": null,
                                            "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                            "phone": null,
                                            "city": null,
                                            "address": null,
                                            "post_code": null,
                                            "created_at": "2020-03-18T10:51:34.000000Z",
                                            "updated_at": "2020-03-18T10:51:34.000000Z"
                                        }
                                    }
                                }
                            ],
                            "links": {
                                "first": "http://127.0.0.1:8000/api/user/classifieds?page=1",
                                "last": "http://127.0.0.1:8000/api/user/classifieds?page=1",
                                "prev": null,
                                "next": null
                            },
                            "meta": {
                                "current_page": 1,
                                "from": 1,
                                "last_page": 1,
                                "path": "http://127.0.0.1:8000/api/user/classifieds",
                                "per_page": 20,
                                "to": 1,
                                "total": 1
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('classifieds').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Panel użytkownika - dane konkretnego ogłoszenia</h2>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@item', ['id' => 'ID']) }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Zwraca dane konkretnego ogłoszenia
                </p>
                <strong>response:</strong>
                <pre id="ad-item">
                    <script>
                        var myData = {
                            "data": {
                                "id": 1,
                                "user_id": 1,
                                "category_id": 1,
                                "title": "First",
                                "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                "contact_person": "Michał",
                                "email": "michallosak@gmail.com",
                                "type": "AD",
                                "starting_price": null,
                                "price": null,
                                "end_time": null,
                                "number_phone": null,
                                "is_negotiation": 1,
                                "is_reservation": 1,
                                "quantity": null,
                                "state": "USED",
                                "views": 0,
                                "status": "PUBLISHED",
                                "created_at": "2020-03-18T10:52:46.000000Z",
                                "updated_at": "2020-03-18T10:52:46.000000Z",
                                "images": [
                                    {
                                        "user_id": 1,
                                        "ad_id": 1,
                                        "path": "http://127.0.0.1:8000/assets/data/classifieds/1584528766.jpeg",
                                        "extension": ""
                                    },
                                    {
                                        "user_id": 1,
                                        "ad_id": 1,
                                        "path": "http://127.0.0.1:8000/assets/data/classifieds/1584528766.jpg",
                                        "extension": ""
                                    },
                                    {
                                        "user_id": 1,
                                        "ad_id": 1,
                                        "path": "http://127.0.0.1:8000/assets/data/classifieds/1584528766.jpg",
                                        "extension": ""
                                    },
                                    {
                                        "user_id": 1,
                                        "ad_id": 1,
                                        "path": "http://127.0.0.1:8000/assets/data/classifieds/1584528766.jpg",
                                        "extension": ""
                                    },
                                    {
                                        "user_id": 1,
                                        "ad_id": 1,
                                        "path": "http://127.0.0.1:8000/assets/data/classifieds/1584528766.jpg",
                                        "extension": ""
                                    }
                                ],
                                "user": {
                                    "id": 1,
                                    "name": "Soft",
                                    "last_name": "Squad",
                                    "email": "michallosak@gmail.com",
                                    "birthday": "2000-08-30",
                                    "activated": 0,
                                    "status": "NEW",
                                    "created_at": "2020-03-18T10:51:34.000000Z",
                                    "updated_at": "2020-03-18T10:51:34.000000Z",
                                    "s": {
                                        "id": 1,
                                        "user_id": 1,
                                        "sex": null,
                                        "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                        "phone": null,
                                        "city": null,
                                        "address": null,
                                        "post_code": null,
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z"
                                    }
                                }
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('ad-item').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Panel użytkownika - archiwum</h2>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@archive', ['id' => 'ID']) }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Endpoint służy do przenoszenia ogłoszenia do archwium oraz usuwania z archiwum <br/>
                    SUCCESS: 1 - ok <br/>
                    SUCCESS: 0 - brak takiego ogłoszenia - ERROR
                </p>
                <strong>response:</strong>
                <pre id="ad-archive">
                    <script>
                        var myData = {
                            "success": 1,
                            "status": "PUBLISHED"
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('ad-archive').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Panel użytkownika - usuwanie ogłoszenia</h2>
        <span>Wymaga autoryzacji</span>
        <ul>
            <li>route: {{ action('User\Classifieds\ClassifiedsController@delete', ['id' => 'ID']) }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Endpoint służy do trwalego usunięcia ogłoszenia <br/>
                    SUCCESS: 1 - ok <br/>
                    SUCCESS: 0 - brak takiego ogłoszenia - ERROR
                </p>
                <strong>response:</strong>
                <pre id="ad-delete">
                    <script>
                        var myData = {
                            "success": 1,
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('ad-delete').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Lista ogłoszeń | FRONT</h2>
        <ul>
            <li>route: {{ action('Front\Classifieds\ClassifiedsController@items') }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Zwraca listę ogłoszeń w serwisie które są dostępne dla sprzedających. <br/>
                    <b>
                        Mamy możliwość filtrowania po:
                        <ul>
                            <li>tytuł: ?title=sdoinsd</li>
                            <li>kategoria: ?category=CATEGORY_ID</li>
                            <li>lokalizacja: ?location=Kraków</li>
                            <li>typie: ?type=AD | PRODUCT | AUCTION | AUCTION_PRODUCT</li>
                            <li>query: ...?title=test&category=1&location=Kraków&type=AUCTION</li>
                        </ul>
                    </b>
                </p>
                <strong>response:</strong>
                <pre id="classifieds-front">
                    <script>
                        var myData = {
                            "data": [
                                {
                                    "id": 2,
                                    "user_id": 1,
                                    "category_id": 1,
                                    "title": "First",
                                    "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                    "contact_person": "Michał",
                                    "email": "michallosak@gmail.com",
                                    "type": "AD",
                                    "starting_price": null,
                                    "price": null,
                                    "end_time": null,
                                    "number_phone": null,
                                    "is_negotiation": 1,
                                    "is_reservation": 1,
                                    "quantity": null,
                                    "state": "USED",
                                    "views": 0,
                                    "status": "PUBLISHED",
                                    "created_at": "2020-03-18T13:51:46.000000Z",
                                    "updated_at": "2020-03-18T13:51:46.000000Z",
                                    "image": "http://127.0.0.1:8000/assets/data/classifieds/df.png",
                                    "images": [],
                                    "user": {
                                        "id": 1,
                                        "name": "Soft",
                                        "last_name": "Squad",
                                        "email": "michallosak@gmail.com",
                                        "birthday": "2000-08-30",
                                        "activated": 0,
                                        "status": "NEW",
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z",
                                        "s": {
                                            "id": 1,
                                            "user_id": 1,
                                            "sex": null,
                                            "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                            "phone": null,
                                            "city": null,
                                            "address": null,
                                            "post_code": null,
                                            "created_at": "2020-03-18T10:51:34.000000Z",
                                            "updated_at": "2020-03-18T10:51:34.000000Z"
                                        }
                                    }
                                }
                            ],
                            "links": {
                                "first": "http://127.0.0.1:8000/api/classifieds?page=1",
                                "last": "http://127.0.0.1:8000/api/classifieds?page=1",
                                "prev": null,
                                "next": null
                            },
                            "meta": {
                                "current_page": 1,
                                "from": 1,
                                "last_page": 1,
                                "path": "http://127.0.0.1:8000/api/classifieds",
                                "per_page": 20,
                                "to": 1,
                                "total": 1
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('classifieds-front').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Konkretne ogłoszenie | FRONT</h2>
        <ul>
            <li>route: {{ action('Front\Classifieds\ClassifiedsController@item', ['id' => 'ID']) }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Endpoint zwraca dane konkretnego ogłoszenia <br/>
                    SUCCESS: 0 - brak ofert
                </p>
                <strong>response:</strong>
                <pre id="ad-front">
                    <script>
                        var myData = {
                            "data": {
                                "id": 2,
                                "user_id": 1,
                                "category_id": 1,
                                "title": "First",
                                "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                "contact_person": "Michał",
                                "email": "michallosak@gmail.com",
                                "type": "AD",
                                "starting_price": null,
                                "price": null,
                                "end_time": null,
                                "number_phone": null,
                                "is_negotiation": 1,
                                "is_reservation": 1,
                                "quantity": null,
                                "state": "USED",
                                "views": 0,
                                "status": "PUBLISHED",
                                "created_at": "2020-03-18T13:51:46.000000Z",
                                "updated_at": "2020-03-18T13:51:46.000000Z",
                                "image": "http://127.0.0.1:8000/assets/data/classifieds/df.png",
                                "images": [],
                                "user": {
                                    "id": 1,
                                    "name": "Soft",
                                    "last_name": "Squad",
                                    "email": "michallosak@gmail.com",
                                    "birthday": "2000-08-30",
                                    "activated": 0,
                                    "status": "NEW",
                                    "created_at": "2020-03-18T10:51:34.000000Z",
                                    "updated_at": "2020-03-18T10:51:34.000000Z",
                                    "s": {
                                        "id": 1,
                                        "user_id": 1,
                                        "sex": null,
                                        "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                        "phone": null,
                                        "city": null,
                                        "address": null,
                                        "post_code": null,
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z"
                                    }
                                }
                            }
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('ad-front').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Lista kategorii | FRONT</h2>
        <ul>
            <li>route: {{ action('Front\Categories\CategoryController@items') }}</li>
            <li>method: POST</li>
            <li>
                <p>
                    Endpoint zwraca listę kategorii <br/>
                </p>
                <strong>response:</strong>
                <pre id="categories">
                    <script>
                        var myData = {
                            "data": [
                                {
                                    "id": 1,
                                    "name": "Motoryzacja",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T13:41:42.000000Z",
                                    "updated_at": "2020-03-20T13:07:35.000000Z"
                                },
                                {
                                    "id": 2,
                                    "name": "Samochody osobowe",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:42:00.000000Z",
                                    "updated_at": "2020-03-19T13:42:00.000000Z"
                                },
                                {
                                    "id": 3,
                                    "name": "Przyczepy",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:43:46.000000Z",
                                    "updated_at": "2020-03-19T13:43:46.000000Z"
                                },
                                {
                                    "id": 4,
                                    "name": "Akcesoria",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:43:54.000000Z",
                                    "updated_at": "2020-03-19T13:43:54.000000Z"
                                },
                                {
                                    "id": 5,
                                    "name": "Motocykle",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:44:04.000000Z",
                                    "updated_at": "2020-03-19T13:44:04.000000Z"
                                },
                                {
                                    "id": 6,
                                    "name": "Części",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:44:16.000000Z",
                                    "updated_at": "2020-03-19T13:44:16.000000Z"
                                },
                                {
                                    "id": 7,
                                    "name": "Ciężarowe & Dostawcze",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:44:30.000000Z",
                                    "updated_at": "2020-03-19T13:44:30.000000Z"
                                },
                                {
                                    "id": 8,
                                    "name": "Nieruchomości",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T13:44:46.000000Z",
                                    "updated_at": "2020-03-19T13:44:46.000000Z"
                                },
                                {
                                    "id": 9,
                                    "name": "Mieszkania",
                                    "icon_class": null,
                                    "parent_id": 8,
                                    "created_at": "2020-03-19T13:44:57.000000Z",
                                    "updated_at": "2020-03-19T13:44:57.000000Z"
                                },
                                {
                                    "id": 10,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 1,
                                    "created_at": "2020-03-19T13:45:05.000000Z",
                                    "updated_at": "2020-03-19T13:45:05.000000Z"
                                },
                                {
                                    "id": 15,
                                    "name": "Domy",
                                    "icon_class": null,
                                    "parent_id": 8,
                                    "created_at": "2020-03-19T13:46:28.000000Z",
                                    "updated_at": "2020-03-19T13:46:28.000000Z"
                                },
                                {
                                    "id": 16,
                                    "name": "Magazyny",
                                    "icon_class": null,
                                    "parent_id": 8,
                                    "created_at": "2020-03-19T13:46:38.000000Z",
                                    "updated_at": "2020-03-19T13:46:38.000000Z"
                                },
                                {
                                    "id": 17,
                                    "name": "Działki",
                                    "icon_class": null,
                                    "parent_id": 8,
                                    "created_at": "2020-03-19T13:46:47.000000Z",
                                    "updated_at": "2020-03-19T13:46:47.000000Z"
                                },
                                {
                                    "id": 18,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 8,
                                    "created_at": "2020-03-19T13:46:56.000000Z",
                                    "updated_at": "2020-03-19T13:46:56.000000Z"
                                },
                                {
                                    "id": 19,
                                    "name": "Praca",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T13:47:24.000000Z",
                                    "updated_at": "2020-03-19T13:47:24.000000Z"
                                },
                                {
                                    "id": 20,
                                    "name": "Administracja",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:47:50.000000Z",
                                    "updated_at": "2020-03-19T13:47:50.000000Z"
                                },
                                {
                                    "id": 21,
                                    "name": "Finanse",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:47:58.000000Z",
                                    "updated_at": "2020-03-19T13:47:58.000000Z"
                                },
                                {
                                    "id": 22,
                                    "name": "Gastronomia",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:49:57.000000Z",
                                    "updated_at": "2020-03-19T13:49:57.000000Z"
                                },
                                {
                                    "id": 23,
                                    "name": "Hotelarstwo",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:50:26.000000Z",
                                    "updated_at": "2020-03-19T13:50:26.000000Z"
                                },
                                {
                                    "id": 24,
                                    "name": "Mechanika samochodowa",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:51:16.000000Z",
                                    "updated_at": "2020-03-19T13:51:16.000000Z"
                                },
                                {
                                    "id": 25,
                                    "name": "Praca z dziećmi",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:51:30.000000Z",
                                    "updated_at": "2020-03-19T13:51:30.000000Z"
                                },
                                {
                                    "id": 26,
                                    "name": "Magazyn",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:51:39.000000Z",
                                    "updated_at": "2020-03-19T13:51:39.000000Z"
                                },
                                {
                                    "id": 27,
                                    "name": "Praca dodatkowa",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:53:48.000000Z",
                                    "updated_at": "2020-03-19T13:53:48.000000Z"
                                },
                                {
                                    "id": 28,
                                    "name": "Budownictwo",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:53:59.000000Z",
                                    "updated_at": "2020-03-19T13:53:59.000000Z"
                                },
                                {
                                    "id": 29,
                                    "name": "Franczyzna",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:54:09.000000Z",
                                    "updated_at": "2020-03-19T13:54:09.000000Z"
                                },
                                {
                                    "id": 30,
                                    "name": "IT",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:54:18.000000Z",
                                    "updated_at": "2020-03-19T13:54:18.000000Z"
                                },
                                {
                                    "id": 31,
                                    "name": "Call Center",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:54:52.000000Z",
                                    "updated_at": "2020-03-19T13:54:52.000000Z"
                                },
                                {
                                    "id": 32,
                                    "name": "Praca za granicą",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:02.000000Z",
                                    "updated_at": "2020-03-19T13:55:02.000000Z"
                                },
                                {
                                    "id": 33,
                                    "name": "Praca dla studentów",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:15.000000Z",
                                    "updated_at": "2020-03-19T13:55:15.000000Z"
                                },
                                {
                                    "id": 34,
                                    "name": "Edukacja",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:22.000000Z",
                                    "updated_at": "2020-03-19T13:55:22.000000Z"
                                },
                                {
                                    "id": 35,
                                    "name": "Praktyka",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:32.000000Z",
                                    "updated_at": "2020-03-19T13:55:32.000000Z"
                                },
                                {
                                    "id": 36,
                                    "name": "Produkcja",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:39.000000Z",
                                    "updated_at": "2020-03-19T13:55:39.000000Z"
                                },
                                {
                                    "id": 37,
                                    "name": "Sprzątanie",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:48.000000Z",
                                    "updated_at": "2020-03-19T13:55:48.000000Z"
                                },
                                {
                                    "id": 38,
                                    "name": "Sprzedawca",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:55:55.000000Z",
                                    "updated_at": "2020-03-19T13:55:55.000000Z"
                                },
                                {
                                    "id": 39,
                                    "name": "Inne",
                                    "icon_class": null,
                                    "parent_id": 19,
                                    "created_at": "2020-03-19T13:56:04.000000Z",
                                    "updated_at": "2020-03-19T13:56:04.000000Z"
                                },
                                {
                                    "id": 40,
                                    "name": "Dom i ogród",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T13:56:23.000000Z",
                                    "updated_at": "2020-03-19T13:56:23.000000Z"
                                },
                                {
                                    "id": 41,
                                    "name": "Meble",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:56:33.000000Z",
                                    "updated_at": "2020-03-19T13:56:33.000000Z"
                                },
                                {
                                    "id": 42,
                                    "name": "Ogród",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:56:43.000000Z",
                                    "updated_at": "2020-03-19T13:56:43.000000Z"
                                },
                                {
                                    "id": 43,
                                    "name": "AGD & RTV",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:57:08.000000Z",
                                    "updated_at": "2020-03-19T13:57:08.000000Z"
                                },
                                {
                                    "id": 44,
                                    "name": "Narzędzia",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:57:18.000000Z",
                                    "updated_at": "2020-03-19T13:57:18.000000Z"
                                },
                                {
                                    "id": 45,
                                    "name": "Wyposażenie wnętrz",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:58:00.000000Z",
                                    "updated_at": "2020-03-19T13:58:00.000000Z"
                                },
                                {
                                    "id": 46,
                                    "name": "Materiały budowlane",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:58:16.000000Z",
                                    "updated_at": "2020-03-19T13:58:16.000000Z"
                                },
                                {
                                    "id": 47,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 40,
                                    "created_at": "2020-03-19T13:58:31.000000Z",
                                    "updated_at": "2020-03-19T13:58:31.000000Z"
                                },
                                {
                                    "id": 48,
                                    "name": "Elektronika",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T13:58:50.000000Z",
                                    "updated_at": "2020-03-19T13:58:50.000000Z"
                                },
                                {
                                    "id": 49,
                                    "name": "Telefony komórkowe",
                                    "icon_class": null,
                                    "parent_id": 48,
                                    "created_at": "2020-03-19T13:59:04.000000Z",
                                    "updated_at": "2020-03-19T13:59:04.000000Z"
                                },
                                {
                                    "id": 50,
                                    "name": "Tablety",
                                    "icon_class": null,
                                    "parent_id": 48,
                                    "created_at": "2020-03-19T13:59:13.000000Z",
                                    "updated_at": "2020-03-19T13:59:13.000000Z"
                                },
                                {
                                    "id": 51,
                                    "name": "Akcesoria",
                                    "icon_class": null,
                                    "parent_id": 48,
                                    "created_at": "2020-03-19T13:59:23.000000Z",
                                    "updated_at": "2020-03-19T13:59:23.000000Z"
                                },
                                {
                                    "id": 52,
                                    "name": "TV",
                                    "icon_class": null,
                                    "parent_id": 48,
                                    "created_at": "2020-03-19T13:59:31.000000Z",
                                    "updated_at": "2020-03-19T13:59:31.000000Z"
                                },
                                {
                                    "id": 53,
                                    "name": "Komputery",
                                    "icon_class": null,
                                    "parent_id": 48,
                                    "created_at": "2020-03-19T13:59:41.000000Z",
                                    "updated_at": "2020-03-19T13:59:41.000000Z"
                                },
                                {
                                    "id": 54,
                                    "name": "Sprzęt audio",
                                    "icon_class": null,
                                    "parent_id": 48,
                                    "created_at": "2020-03-19T14:00:04.000000Z",
                                    "updated_at": "2020-03-19T14:00:04.000000Z"
                                },
                                {
                                    "id": 55,
                                    "name": "Moda",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:01:09.000000Z",
                                    "updated_at": "2020-03-19T14:01:09.000000Z"
                                },
                                {
                                    "id": 56,
                                    "name": "Ubrania",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:01:19.000000Z",
                                    "updated_at": "2020-03-19T14:01:19.000000Z"
                                },
                                {
                                    "id": 57,
                                    "name": "Odzież ciążowa",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:01:30.000000Z",
                                    "updated_at": "2020-03-19T14:01:30.000000Z"
                                },
                                {
                                    "id": 59,
                                    "name": "Torebki",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:02:22.000000Z",
                                    "updated_at": "2020-03-19T14:02:22.000000Z"
                                },
                                {
                                    "id": 60,
                                    "name": "Buty",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:02:36.000000Z",
                                    "updated_at": "2020-03-19T14:02:36.000000Z"
                                },
                                {
                                    "id": 61,
                                    "name": "Dodatki",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:02:45.000000Z",
                                    "updated_at": "2020-03-19T14:02:45.000000Z"
                                },
                                {
                                    "id": 62,
                                    "name": "Zegarki",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:02:54.000000Z",
                                    "updated_at": "2020-03-19T14:02:54.000000Z"
                                },
                                {
                                    "id": 63,
                                    "name": "Bielizna",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:03:11.000000Z",
                                    "updated_at": "2020-03-19T14:03:11.000000Z"
                                },
                                {
                                    "id": 64,
                                    "name": "Biżuteria",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:04:06.000000Z",
                                    "updated_at": "2020-03-19T14:04:06.000000Z"
                                },
                                {
                                    "id": 65,
                                    "name": "Kosmetyki",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:04:17.000000Z",
                                    "updated_at": "2020-03-19T14:04:17.000000Z"
                                },
                                {
                                    "id": 66,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 55,
                                    "created_at": "2020-03-19T14:04:28.000000Z",
                                    "updated_at": "2020-03-19T14:04:28.000000Z"
                                },
                                {
                                    "id": 67,
                                    "name": "Rolnictwo",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:04:57.000000Z",
                                    "updated_at": "2020-03-19T14:04:57.000000Z"
                                },
                                {
                                    "id": 68,
                                    "name": "Ciągniki",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:05:09.000000Z",
                                    "updated_at": "2020-03-19T14:05:09.000000Z"
                                },
                                {
                                    "id": 69,
                                    "name": "Części",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:05:20.000000Z",
                                    "updated_at": "2020-03-19T14:05:20.000000Z"
                                },
                                {
                                    "id": 70,
                                    "name": "Zwierzęta hodowlane",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:05:34.000000Z",
                                    "updated_at": "2020-03-19T14:05:34.000000Z"
                                },
                                {
                                    "id": 71,
                                    "name": "Maszyny rolnicze",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:05:44.000000Z",
                                    "updated_at": "2020-03-19T14:05:44.000000Z"
                                },
                                {
                                    "id": 72,
                                    "name": "Akcesoria",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:05:56.000000Z",
                                    "updated_at": "2020-03-19T14:05:56.000000Z"
                                },
                                {
                                    "id": 73,
                                    "name": "Produkty rolne",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:06:33.000000Z",
                                    "updated_at": "2020-03-19T14:06:33.000000Z"
                                },
                                {
                                    "id": 74,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 67,
                                    "created_at": "2020-03-19T14:06:46.000000Z",
                                    "updated_at": "2020-03-19T14:06:46.000000Z"
                                },
                                {
                                    "id": 75,
                                    "name": "Zwierzęta",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:06:54.000000Z",
                                    "updated_at": "2020-03-19T14:06:54.000000Z"
                                },
                                {
                                    "id": 76,
                                    "name": "Psy",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:07:02.000000Z",
                                    "updated_at": "2020-03-19T14:07:02.000000Z"
                                },
                                {
                                    "id": 77,
                                    "name": "Koty",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:07:10.000000Z",
                                    "updated_at": "2020-03-19T14:07:10.000000Z"
                                },
                                {
                                    "id": 78,
                                    "name": "Ptaki",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:07:19.000000Z",
                                    "updated_at": "2020-03-19T14:07:19.000000Z"
                                },
                                {
                                    "id": 79,
                                    "name": "Gryzonie",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:07:32.000000Z",
                                    "updated_at": "2020-03-19T14:07:32.000000Z"
                                },
                                {
                                    "id": 80,
                                    "name": "Konie",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:07:42.000000Z",
                                    "updated_at": "2020-03-19T14:07:42.000000Z"
                                },
                                {
                                    "id": 81,
                                    "name": "Akcesoria",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:08:26.000000Z",
                                    "updated_at": "2020-03-19T14:08:26.000000Z"
                                },
                                {
                                    "id": 82,
                                    "name": "Akwarystyka",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:08:43.000000Z",
                                    "updated_at": "2020-03-19T14:08:43.000000Z"
                                },
                                {
                                    "id": 83,
                                    "name": "Terrarystyka",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:08:54.000000Z",
                                    "updated_at": "2020-03-19T14:08:54.000000Z"
                                },
                                {
                                    "id": 84,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 75,
                                    "created_at": "2020-03-19T14:09:05.000000Z",
                                    "updated_at": "2020-03-19T14:09:05.000000Z"
                                },
                                {
                                    "id": 85,
                                    "name": "Dla Dzieci",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:09:31.000000Z",
                                    "updated_at": "2020-03-19T14:09:31.000000Z"
                                },
                                {
                                    "id": 86,
                                    "name": "Zabawki",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:09:39.000000Z",
                                    "updated_at": "2020-03-19T14:09:39.000000Z"
                                },
                                {
                                    "id": 87,
                                    "name": "Meble",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:09:46.000000Z",
                                    "updated_at": "2020-03-19T14:09:46.000000Z"
                                },
                                {
                                    "id": 88,
                                    "name": "Wózki",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:09:55.000000Z",
                                    "updated_at": "2020-03-19T14:09:55.000000Z"
                                },
                                {
                                    "id": 89,
                                    "name": "Ubrania",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:10:03.000000Z",
                                    "updated_at": "2020-03-19T14:10:03.000000Z"
                                },
                                {
                                    "id": 90,
                                    "name": "Dla niemowląt",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:10:20.000000Z",
                                    "updated_at": "2020-03-19T14:10:20.000000Z"
                                },
                                {
                                    "id": 91,
                                    "name": "Buciki",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:10:30.000000Z",
                                    "updated_at": "2020-03-19T14:10:30.000000Z"
                                },
                                {
                                    "id": 92,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 85,
                                    "created_at": "2020-03-19T14:10:40.000000Z",
                                    "updated_at": "2020-03-19T14:10:40.000000Z"
                                },
                                {
                                    "id": 93,
                                    "name": "Sport",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:10:45.000000Z",
                                    "updated_at": "2020-03-19T14:10:45.000000Z"
                                },
                                {
                                    "id": 94,
                                    "name": "Rowery",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:10:57.000000Z",
                                    "updated_at": "2020-03-19T14:10:57.000000Z"
                                },
                                {
                                    "id": 95,
                                    "name": "Wędkarstwo",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:11:29.000000Z",
                                    "updated_at": "2020-03-19T14:11:29.000000Z"
                                },
                                {
                                    "id": 96,
                                    "name": "Sporty wodne",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:11:42.000000Z",
                                    "updated_at": "2020-03-19T14:11:42.000000Z"
                                },
                                {
                                    "id": 97,
                                    "name": "Fitness",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:11:51.000000Z",
                                    "updated_at": "2020-03-19T14:11:51.000000Z"
                                },
                                {
                                    "id": 98,
                                    "name": "Odzież",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:12:00.000000Z",
                                    "updated_at": "2020-03-19T14:12:00.000000Z"
                                },
                                {
                                    "id": 99,
                                    "name": "Jeździectwo",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:12:12.000000Z",
                                    "updated_at": "2020-03-19T14:12:12.000000Z"
                                },
                                {
                                    "id": 100,
                                    "name": "Sporty zimowe",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:12:24.000000Z",
                                    "updated_at": "2020-03-19T14:12:24.000000Z"
                                },
                                {
                                    "id": 101,
                                    "name": "Obuwie",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:12:34.000000Z",
                                    "updated_at": "2020-03-19T14:12:34.000000Z"
                                },
                                {
                                    "id": 102,
                                    "name": "Akcesoria",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:12:45.000000Z",
                                    "updated_at": "2020-03-19T14:12:45.000000Z"
                                },
                                {
                                    "id": 103,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 93,
                                    "created_at": "2020-03-19T14:13:35.000000Z",
                                    "updated_at": "2020-03-19T14:13:35.000000Z"
                                },
                                {
                                    "id": 104,
                                    "name": "Rozrywka",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:13:41.000000Z",
                                    "updated_at": "2020-03-19T14:13:41.000000Z"
                                },
                                {
                                    "id": 105,
                                    "name": "Bilety",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:13:50.000000Z",
                                    "updated_at": "2020-03-19T14:13:50.000000Z"
                                },
                                {
                                    "id": 106,
                                    "name": "Turystyka",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:13:59.000000Z",
                                    "updated_at": "2020-03-19T14:13:59.000000Z"
                                },
                                {
                                    "id": 107,
                                    "name": "Muzyka",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:14:07.000000Z",
                                    "updated_at": "2020-03-19T14:14:07.000000Z"
                                },
                                {
                                    "id": 108,
                                    "name": "Książki",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:14:18.000000Z",
                                    "updated_at": "2020-03-19T14:14:18.000000Z"
                                },
                                {
                                    "id": 109,
                                    "name": "Filmy",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:14:25.000000Z",
                                    "updated_at": "2020-03-19T14:14:25.000000Z"
                                },
                                {
                                    "id": 110,
                                    "name": "Gry",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:14:32.000000Z",
                                    "updated_at": "2020-03-19T14:14:32.000000Z"
                                },
                                {
                                    "id": 111,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 104,
                                    "created_at": "2020-03-19T14:14:41.000000Z",
                                    "updated_at": "2020-03-19T14:14:41.000000Z"
                                },
                                {
                                    "id": 112,
                                    "name": "Hobby",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:14:47.000000Z",
                                    "updated_at": "2020-03-19T14:14:47.000000Z"
                                },
                                {
                                    "id": 113,
                                    "name": "Kolekcje",
                                    "icon_class": null,
                                    "parent_id": 112,
                                    "created_at": "2020-03-19T14:15:01.000000Z",
                                    "updated_at": "2020-03-19T14:15:01.000000Z"
                                },
                                {
                                    "id": 114,
                                    "name": "Militaria",
                                    "icon_class": null,
                                    "parent_id": 112,
                                    "created_at": "2020-03-19T14:15:10.000000Z",
                                    "updated_at": "2020-03-19T14:15:10.000000Z"
                                },
                                {
                                    "id": 115,
                                    "name": "Instrumenty",
                                    "icon_class": null,
                                    "parent_id": 112,
                                    "created_at": "2020-03-19T14:15:24.000000Z",
                                    "updated_at": "2020-03-19T14:15:24.000000Z"
                                },
                                {
                                    "id": 116,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 112,
                                    "created_at": "2020-03-19T14:15:34.000000Z",
                                    "updated_at": "2020-03-19T14:15:34.000000Z"
                                },
                                {
                                    "id": 117,
                                    "name": "Usługi",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:15:39.000000Z",
                                    "updated_at": "2020-03-19T14:15:39.000000Z"
                                },
                                {
                                    "id": 118,
                                    "name": "Budownictwo",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:15:49.000000Z",
                                    "updated_at": "2020-03-19T14:15:49.000000Z"
                                },
                                {
                                    "id": 119,
                                    "name": "Współpraca",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:16:01.000000Z",
                                    "updated_at": "2020-03-19T14:16:01.000000Z"
                                },
                                {
                                    "id": 120,
                                    "name": "Wyposażenie firm",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:16:12.000000Z",
                                    "updated_at": "2020-03-19T14:16:12.000000Z"
                                },
                                {
                                    "id": 121,
                                    "name": "Korepetycje",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:16:25.000000Z",
                                    "updated_at": "2020-03-19T14:16:25.000000Z"
                                },
                                {
                                    "id": 122,
                                    "name": "Kursy",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:16:45.000000Z",
                                    "updated_at": "2020-03-19T14:16:45.000000Z"
                                },
                                {
                                    "id": 123,
                                    "name": "Obsługa gości",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:17:00.000000Z",
                                    "updated_at": "2020-03-19T14:17:00.000000Z"
                                },
                                {
                                    "id": 124,
                                    "name": "Muzycy",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:17:10.000000Z",
                                    "updated_at": "2020-03-19T14:17:10.000000Z"
                                },
                                {
                                    "id": 125,
                                    "name": "Serwis",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:17:26.000000Z",
                                    "updated_at": "2020-03-19T14:17:26.000000Z"
                                },
                                {
                                    "id": 126,
                                    "name": "IT",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:17:53.000000Z",
                                    "updated_at": "2020-03-19T14:17:53.000000Z"
                                },
                                {
                                    "id": 127,
                                    "name": "Zdrowie",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:18:02.000000Z",
                                    "updated_at": "2020-03-19T14:18:02.000000Z"
                                },
                                {
                                    "id": 128,
                                    "name": "Ogrodnictwo",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:18:11.000000Z",
                                    "updated_at": "2020-03-19T14:18:11.000000Z"
                                },
                                {
                                    "id": 129,
                                    "name": "Motoryzacja",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:18:23.000000Z",
                                    "updated_at": "2020-03-19T14:18:23.000000Z"
                                },
                                {
                                    "id": 130,
                                    "name": "Transport",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:18:34.000000Z",
                                    "updated_at": "2020-03-19T14:18:34.000000Z"
                                },
                                {
                                    "id": 131,
                                    "name": "Reklama",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:18:46.000000Z",
                                    "updated_at": "2020-03-19T14:18:46.000000Z"
                                },
                                {
                                    "id": 132,
                                    "name": "Programiści",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:19:36.000000Z",
                                    "updated_at": "2020-03-19T14:19:36.000000Z"
                                },
                                {
                                    "id": 133,
                                    "name": "Uroda",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:19:46.000000Z",
                                    "updated_at": "2020-03-19T14:19:46.000000Z"
                                },
                                {
                                    "id": 134,
                                    "name": "Pozostałe",
                                    "icon_class": null,
                                    "parent_id": 117,
                                    "created_at": "2020-03-19T14:19:58.000000Z",
                                    "updated_at": "2020-03-19T14:19:58.000000Z"
                                },
                                {
                                    "id": 135,
                                    "name": "Imprezy Okolicznościowe",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:20:10.000000Z",
                                    "updated_at": "2020-03-19T14:20:10.000000Z"
                                },
                                {
                                    "id": 136,
                                    "name": "Śluby",
                                    "icon_class": null,
                                    "parent_id": 135,
                                    "created_at": "2020-03-19T14:20:38.000000Z",
                                    "updated_at": "2020-03-19T14:20:38.000000Z"
                                },
                                {
                                    "id": 137,
                                    "name": "Komunia & Bierzmowanie",
                                    "icon_class": null,
                                    "parent_id": 135,
                                    "created_at": "2020-03-19T14:21:02.000000Z",
                                    "updated_at": "2020-03-19T14:21:02.000000Z"
                                },
                                {
                                    "id": 138,
                                    "name": "Akcesoria",
                                    "icon_class": null,
                                    "parent_id": 135,
                                    "created_at": "2020-03-19T14:21:11.000000Z",
                                    "updated_at": "2020-03-19T14:21:11.000000Z"
                                },
                                {
                                    "id": 139,
                                    "name": "Inne",
                                    "icon_class": null,
                                    "parent_id": 135,
                                    "created_at": "2020-03-19T14:21:20.000000Z",
                                    "updated_at": "2020-03-19T14:21:20.000000Z"
                                },
                                {
                                    "id": 140,
                                    "name": "Erotyka",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:22:08.000000Z",
                                    "updated_at": "2020-03-19T14:22:08.000000Z"
                                },
                                {
                                    "id": 141,
                                    "name": "Dla Pań",
                                    "icon_class": null,
                                    "parent_id": 140,
                                    "created_at": "2020-03-19T14:22:32.000000Z",
                                    "updated_at": "2020-03-19T14:22:32.000000Z"
                                },
                                {
                                    "id": 142,
                                    "name": "Dla Panów",
                                    "icon_class": null,
                                    "parent_id": 140,
                                    "created_at": "2020-03-19T14:22:43.000000Z",
                                    "updated_at": "2020-03-19T14:22:43.000000Z"
                                },
                                {
                                    "id": 143,
                                    "name": "Inne",
                                    "icon_class": null,
                                    "parent_id": 140,
                                    "created_at": "2020-03-19T14:23:26.000000Z",
                                    "updated_at": "2020-03-19T14:23:26.000000Z"
                                },
                                {
                                    "id": 144,
                                    "name": "Do wynajęcia",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:47:07.000000Z",
                                    "updated_at": "2020-03-19T14:47:07.000000Z"
                                },
                                {
                                    "id": 145,
                                    "name": "Do wynajęcia",
                                    "icon_class": null,
                                    "parent_id": 0,
                                    "created_at": "2020-03-19T14:48:52.000000Z",
                                    "updated_at": "2020-03-19T14:48:52.000000Z"
                                },
                                {
                                    "id": 146,
                                    "name": "Biura",
                                    "icon_class": null,
                                    "parent_id": 144,
                                    "created_at": "2020-03-19T14:49:07.000000Z",
                                    "updated_at": "2020-03-19T14:49:07.000000Z"
                                },
                                {
                                    "id": 147,
                                    "name": "Lokale",
                                    "icon_class": null,
                                    "parent_id": 145,
                                    "created_at": "2020-03-19T14:49:24.000000Z",
                                    "updated_at": "2020-03-19T14:49:24.000000Z"
                                },
                                {
                                    "id": 148,
                                    "name": "Pokoje",
                                    "icon_class": null,
                                    "parent_id": 145,
                                    "created_at": "2020-03-19T14:49:43.000000Z",
                                    "updated_at": "2020-03-19T14:49:43.000000Z"
                                }
                            ]
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('categories').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
    <li>
        <h2>Lista ogłoszeń w danej kategorii | FRONT</h2>
        <ul>
            <li>route: {{ action('Front\Categories\CategoryController@item', ['id' => 'ID']) }}</li>
            <li>method: POST</li>
            <li>ID - id kategorii</li>
            <li>
                <p>
                    Endpoint zwraca listę ogłoszeń przypisanych do danej kategorii <br/>
                    SUCCESS: 0 - brak kategorii
                </p>
                <strong>response:</strong>
                <pre id="categories-classifieds">
                    <script>
                        var myData = {
                            "data": [
                                {
                                    "id": 2,
                                    "user_id": 1,
                                    "category_id": 1,
                                    "title": "First",
                                    "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                    "contact_person": "Michał",
                                    "email": "michallosak@gmail.com",
                                    "type": "AD",
                                    "starting_price": null,
                                    "price": null,
                                    "end_time": null,
                                    "number_phone": null,
                                    "is_negotiation": 1,
                                    "is_reservation": 1,
                                    "quantity": null,
                                    "state": "USED",
                                    "views": 0,
                                    "status": "PUBLISHED",
                                    "created_at": "2020-03-18T13:51:46.000000Z",
                                    "updated_at": "2020-03-18T13:51:46.000000Z",
                                    "image": "http://127.0.0.1:8000/assets/data/classifieds/df.png",
                                    "images": [],
                                    "user": {
                                        "id": 1,
                                        "name": "Soft",
                                        "last_name": "Squad",
                                        "email": "michallosak@gmail.com",
                                        "birthday": "2000-08-30",
                                        "activated": 0,
                                        "status": "NEW",
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z",
                                        "s": {
                                            "id": 1,
                                            "user_id": 1,
                                            "sex": null,
                                            "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                            "phone": null,
                                            "city": null,
                                            "address": null,
                                            "post_code": null,
                                            "created_at": "2020-03-18T10:51:34.000000Z",
                                            "updated_at": "2020-03-18T10:51:34.000000Z"
                                        }
                                    }
                                },
                                {
                                    "id": 3,
                                    "user_id": 1,
                                    "category_id": 1,
                                    "title": "First",
                                    "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                    "contact_person": "Michał",
                                    "email": "michallosak@gmail.com",
                                    "type": "AD",
                                    "starting_price": null,
                                    "price": null,
                                    "end_time": null,
                                    "number_phone": null,
                                    "is_negotiation": 1,
                                    "is_reservation": 1,
                                    "quantity": null,
                                    "state": "USED",
                                    "views": 0,
                                    "status": "NEW",
                                    "created_at": "2020-03-18T14:09:52.000000Z",
                                    "updated_at": "2020-03-18T14:09:52.000000Z",
                                    "image": "http://127.0.0.1:8000/assets/data/classifieds/df.png",
                                    "images": [],
                                    "user": {
                                        "id": 1,
                                        "name": "Soft",
                                        "last_name": "Squad",
                                        "email": "michallosak@gmail.com",
                                        "birthday": "2000-08-30",
                                        "activated": 0,
                                        "status": "NEW",
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z",
                                        "s": {
                                            "id": 1,
                                            "user_id": 1,
                                            "sex": null,
                                            "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                            "phone": null,
                                            "city": null,
                                            "address": null,
                                            "post_code": null,
                                            "created_at": "2020-03-18T10:51:34.000000Z",
                                            "updated_at": "2020-03-18T10:51:34.000000Z"
                                        }
                                    }
                                },
                                {
                                    "id": 4,
                                    "user_id": 1,
                                    "category_id": 1,
                                    "title": "First",
                                    "content": "s[pdk[spdpsmdpsmsm[pdspds[pdspdspmpmsdpsdpmpmsdpomdsmpodspomsdpomdspomdspomsdpomds",
                                    "contact_person": "Michał",
                                    "email": "michallosak@gmail.com",
                                    "type": "AD",
                                    "starting_price": null,
                                    "price": null,
                                    "end_time": null,
                                    "number_phone": null,
                                    "is_negotiation": 1,
                                    "is_reservation": 1,
                                    "quantity": null,
                                    "state": "USED",
                                    "views": 0,
                                    "status": "NEW",
                                    "created_at": "2020-03-18T14:10:31.000000Z",
                                    "updated_at": "2020-03-18T14:10:31.000000Z",
                                    "image": "http://127.0.0.1:8000/assets/data/classifieds/f28aee5c2b0c5dff6c4cb2c458bb493d.jpg",
                                    "images": [
                                        {
                                            "path": "http://127.0.0.1:8000/assets/data/classifieds/f28aee5c2b0c5dff6c4cb2c458bb493d.jpg"
                                        },
                                        {
                                            "path": "http://127.0.0.1:8000/assets/data/classifieds/2be4848915eea0fba86384dc4a85659d.jpg"
                                        },
                                        {
                                            "path": "http://127.0.0.1:8000/assets/data/classifieds/3dda9b8cf7d993b0e93aaa471ef4efcd.jpg"
                                        },
                                        {
                                            "path": "http://127.0.0.1:8000/assets/data/classifieds/97cc542be5fcb62648f2712c7eb41c41.jpg"
                                        }
                                    ],
                                    "user": {
                                        "id": 1,
                                        "name": "Soft",
                                        "last_name": "Squad",
                                        "email": "michallosak@gmail.com",
                                        "birthday": "2000-08-30",
                                        "activated": 0,
                                        "status": "NEW",
                                        "created_at": "2020-03-18T10:51:34.000000Z",
                                        "updated_at": "2020-03-18T10:51:34.000000Z",
                                        "s": {
                                            "id": 1,
                                            "user_id": 1,
                                            "sex": null,
                                            "avatar_src": "http://127.0.0.1:8000/assets/data/users/avatars/df.jpg",
                                            "phone": null,
                                            "city": null,
                                            "address": null,
                                            "post_code": null,
                                            "created_at": "2020-03-18T10:51:34.000000Z",
                                            "updated_at": "2020-03-18T10:51:34.000000Z"
                                        }
                                    }
                                }
                            ]
                        };
                        var textedJson = JSON.stringify(myData, undefined, 4);
                        document.getElementById('categories-classifieds').innerHTML = textedJson;
                    </script>
                </pre>
            </li>
        </ul>
    </li>
</ol>
</body>
</html>
