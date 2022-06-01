<form class="form-signin w-50" action="login" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
         height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Email address"
           autocomplete="off"
           autofocus
           value="<?php
           $usr = $username ?? '';
           echo $usr; ?>"
    >
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
    <div class="checkbox mb-3">
    </div>

    <?php
    if (isset($error)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo $error;
        echo "</div>";
    }
    ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022 by ToLeHoai</p>
</form>

