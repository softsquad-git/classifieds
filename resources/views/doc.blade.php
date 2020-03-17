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
</ol>
</body>
</html>
