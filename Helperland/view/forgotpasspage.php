<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets\Css\forgotpasspage.css">

</head>

<body>
    <section class="fpasssection">
        <div class="container-fluid d-flex">
            <form action="<?= Config::base_url . '?controller=Authentication&function=setPass' ?>" method="POST">
                <label for="form" class="form-label p-2"><h3>Set Your Password</h3></label>
                <div class="row">
                    <label for="inputEmail3" class="col-md-4 col-form-label">
                        New Password :</label>
                    <div class="col">
                        <input type="password" name="pass" class="form-control" placeholder="New Password">
                    </div>
                </div>

                <div class="row">
                    <label for="inputEmail3" class="col-md-4 col-form-label">Confirm Password :</label>
                    <div class="col">
                        <input type="password" name="cpass" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="row btn-div">
                    <button type="submit" value="set" name="set" class="btn set-pass">Set Password</button>
                </div>

            </form>
        </div>
    </section>
</body>

</html>