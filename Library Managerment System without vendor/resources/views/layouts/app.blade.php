<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" type="image/png"  href="favicon.png"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Library @yield('pageTitle')</title>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        })
       
    </script>
    <style>
    
        td {
            text-align: left;
        }
        td a{
            text-align: center;
        }
        .cont{
            display: flex;
        }
        .cont .content{
            width: 100%;
            padding:5vh;
        }
        li.active{

        }

    </style>
<style>
    .alert {
        transition: opacity 1s ease-out;
    }

    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>



</head>
<body>
    {{-- start left sidebar --}}
    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">
            <!-- Left Sidebar -->
            <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark d-flex sticky">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-6">Library Manetgerment System</span>
                    </a>
                    <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start " id="menu">
                        <li class="nav-item">
                            <a href="/" class="nav-link px-md-5 px-3 text-white {{ request()->is('/') ? 'active' : '' }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link px-md-5 px-3 text-white {{ request()->is('user*') ? 'active' : '' }}">
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('books.index')}}" class="nav-link px-md-5 px-3 text-white {{ request()->is('books*') ? 'active' : '' }}">
                                Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tran.index')}}" class="nav-link px-md-5 px-3 text-white {{ request()->is('tran*') ? 'active' : '' }}">
                                Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('genre.index')}}" class="nav-link px-md-5 px-3 text-white {{ request()->is('genre*') ? 'active' : '' }}">
                                Genres
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('author.index')}}" class="nav-link px-md-5 px-3 text-white {{ request()->is('author*') ? 'active' : '' }}">
                                Authors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search.index')}}" class="nav-link px-md-5 px-3 text-white {{ request()->is('st*') ? 'active' : '' }}">
                                Search
                            </a>
                        </li>
                        
                        
                        {{-- end list dashboard --}}
                    </ul>
                    <!-- for profile Dropdown list-->
                    <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{session('username')}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"> 
                            <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    
            <!-- Main Content -->
            <div class="col d-flex flex-column h-sm-100">
                <main class="row overflow-auto">
                    <div class="col pt-3">
                        @yield('content')

                    </div>
                </main>
            </div>
        </div>
    </div>
    

    


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>