<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Delete</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
        <form action="delete_data" method="post">
            <input name="userid" type="text">
            <input name="movieid" type="text">
            <input type="submit" value="送出">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </body>
</html>