<!DOCTYPE html>
<html lang=”en”>
    <head>
        <meta charset=”UTF-8">
        <title>Alert</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        {% load static %}
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>

    <style>
        table {
          border-collapse: collapse;
        }

        table, th, td {
          border: 1px solid black;
        }
        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}
        tr td:hover {background-color:#aaaaaa;}
        th {
          background-color: #666666;
          color: white;
        }
        .header {
           background-color: #398B93;
           color: white;
           font-size: 1.5em;
           padding: 1rem;
           text-align: center;
           text-transform: uppercase;
        }
        .table-users {
           border: 1px solid #398B93;
           border-radius: 10px;
           box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
           max-width: calc(100% - 2em);
           margin: 1em auto;
           overflow: hidden;
           width: 1000px;
        }
        #inner {
          display: table;
          margin: 0 auto;
        }

        #outer {
          width:100%
        }
    </style>
    <body id="page-top">
    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/index">Movie HW</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/show">INFO</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolioModal1" data-bs-toggle="modal" data-bs-target="#portfolioModal1">SEARCH</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolioModal2" data-bs-toggle="modal" data-bs-target="#portfolioModal2">UPDATE</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolioModal3" data-bs-toggle="modal" data-bs-target="#portfolioModal3">DELETE</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolioModal4" data-bs-toggle="modal" data-bs-target="#portfolioModal4">MODEL</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead text-center">
            <div class="table-users", id="customers">
                <div class="header">info</div>
                    <table border="1" style=width:100%>
                        <thead>
                            <tr>
                                <th>userid</th>
                                <th>movieid</th>
                                <th>rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movie as $item)
                            <tr>
                                <td>{{$item->userid}}</td>
                                <td>{{$item->movieid}}</td>
                                <td>{{$item->rating}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </header>
        <!-- Bootstrap core JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!--search-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">userId</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <input type="search" id="myText" name="q" aria-label="Search through site content">
                                    <button onclick="myFunction()" class="btn btn-primary" data-bs-dismiss="modal">Search</button>
                                    <!-- Portfolio Modal - Text-->
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--update-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">user, movie, rating</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <label>user: </label>
                                    <input type="search" id="user" name="q" aria-label="Search through site content">
                                    <br>
                                    <br>
                                    <label>movie: </label>
                                    <input type="search" id="movie" name="q" aria-label="Search through site content">
                                    <br>
                                    <br>
                                    <label>rating: </label>
                                    <input type="search" id="rating" name="q" aria-label="Search through site content">
                                    <button onclick="myFunction2()" class="btn btn-primary" data-bs-dismiss="modal">Search</button>
                                    <!-- Portfolio Modal - Text-->
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--DELETE-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">user, movie</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <form action="/delete_data" method="post">
                                        <label>user: </label>
                                        <input name="userid" type="text">
                                        <br>
                                        <br>
                                        <label>movie: </label>
                                        <input name="movieid" type="text">
                                        <br>
                                        <br>
                                        <input type="submit" value="Delete" class="btn btn-primary" data-bs-dismiss="modal">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </form>
                                    <!-- Portfolio Modal - Text-->
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--MODEL-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">MODEL</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <form action="/helloworld" method="post">
                                        <label>user: </label>
                                        <input name="userid" type="text">
                                        <br>
                                        <br>
                                        <input type="submit" value="Predict" class="btn btn-primary" data-bs-dismiss="modal">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </form>
                                    <!-- Portfolio Modal - Text-->
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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