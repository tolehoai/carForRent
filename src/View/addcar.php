<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Checkout example · Bootstrap v5.2</title>


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg"
                 alt="" width="72" height="57">
            <h2>Add car</h2>
        </div>


        <a href="/">Back to Homepage</a>
</div>

<div class="row g-5 justify-content-center">

    <div class="col-md-5 col-lg-5">

        <form class="needs-validation" method="POST" action="addCar" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand">
            </div>
            <label for="exampleColorInput" class="form-label">Color</label>
            <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c"
                   title="Choose your color" name="color">
            <div class="row gy-3">

                <div class="col-md-6">
                    <label for="cc-name" class="form-label">Luggage</label>
                    <input type="text" class="form-control" placeholder="" name="luggage">

                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cc-number" class="form-label">Doors</label>
                    <input type="text" class="form-control" placeholder="" name="doors">
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="cc-name" class="form-label">Passenger</label>
                    <input type="text" class="form-control" placeholder="" name="passenger">

                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cc-number" class="form-label">Price</label>
                    <input type="text" class="form-control" placeholder="" name="price">
                    <div class="invalid-feedback">
                        Add car
                    </div>
                </div>

            </div>
            <div class="mt-3">
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Register</button>

    </div>


    </form>
</div>
</div>
</main>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 To Le Hoai</p>

</footer>
</div>


<script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

<script src="form-validation.js"></script>
</body>
</html>
