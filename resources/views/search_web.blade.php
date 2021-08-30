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
        <label>Please enter a userId: </label>
        <input type="search" id="myText" name="q" aria-label="Search through site content">
        <button onclick="myFunction()">Search</button>

        <br>
        <p>Please enter [user, movie, rating]:</p>
        <label>user: </label>
        <input type="search" id="user" name="q" aria-label="Search through site content">
        <br>
        <label>movie: </label>
        <input type="search" id="movie" name="q" aria-label="Search through site content">
        <br>
        <label>rating: </label>
        <input type="search" id="rating" name="q" aria-label="Search through site content">
        <button onclick="myFunction2()">Search</button>
        <script>
            function myFunction() {
                var userid = document.getElementById("myText").value;
                location.href = "/index/"+userid;
            }
            function myFunction2() {
                var user = document.getElementById("user").value;
                var movie = document.getElementById("movie").value;
                var rating = document.getElementById("rating").value;
                location.href = "/index/"+user+"/"+movie+"/"+rating;
            }
        </script>
    </body>
</html>