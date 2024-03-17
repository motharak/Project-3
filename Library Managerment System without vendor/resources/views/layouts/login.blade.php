<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" type="image/png"  href="favicon.png"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Library @yield('pageTitle')</title>
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
    

    @yield('conten')
    

    
{{-- End left sidebar --}}
    {{-- <div class="container">
        <div class="row">
            <ul>
                <li>Dashboard</li>
                <li>Student</li>
                <li>Teacher</li>
                <li>Attendente</li>
            </ul>
        </div>
    </div> --}}


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alertElement = document.querySelector('.alert');

        setTimeout(function () {
            alertElement.classList.add('fade-out');
            setTimeout(function () {
                alertElement.remove();
            }, 800); 
        }, 4000);
    });
</script>
</script>
</body>
</html>