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
            <h2>Register form</h2>
        </div>

        <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
            echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
            echo '<div >';
            echo $error;
            echo '</div >';
            echo '</div >';

        } ?>

        <?php
        if (isset($success)) {
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
            echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
            echo ' <div>';
            echo $success;
            echo '</div>';

        }
        ?>
       <a href="/">Back to Homepage</a>
</div>

<div class="row g-5 justify-content-center">

    <div class="col-md-5 col-lg-5">

        <form class="needs-validation" method="POST" action="register">
            <div class="row g-3 pt-2">
                <div class="col-sm-12">
                    <label for="firstName" class="form-label">User name</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder=""
                           value="">
                    <?php
                    if (isset($error['username'])) {
                        echo '<p class="errorMessage" style="color: red; font-style: italic">';
                        echo $error['username'];
                        echo '</p>';
                    }
                    ?>

                </div>
            </div>
            <div class="row g-3 pt-2">
                <div class="col-sm-12">
                    <label for="firstName" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder=""
                           value="">
                    <?php
                    if (isset($error['password'])) {
                        echo '<p class="errorMessage" style="color: red; font-style: italic">';
                        echo $error['password'];
                        echo '</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="row g-3 pt-2">
                <div class="col-sm-12">
                    <label for="firstName" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                           placeholder="" value="">
                    <?php
                    if (isset($error['confirmPassword'])) {
                        echo '<p class="errorMessage" style="color: red; font-style: italic">';
                        echo $error['confirmPassword'];
                        echo '</p>';
                    }
                    ?>
                </div>
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
