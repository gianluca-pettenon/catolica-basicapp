
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIANLUCA PETTENON: Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <div class="col-lg-4 offset-lg-4 pt-5">

            <div class="card">

                <div class="card-header text-white bg-primary">
                    Autenticação
                </div>

                <div class="card-body">

                    <form name="formAuth" method="POST" autocomplete="off">

                        <div class="form-group">
                            <label for="username" class="form-label">Usu&aacute;rio <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" placeholder="Usu&aacute;rio" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="password" class="form-label">Senha <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" placeholder="Senha" required>
                        </div>

                        <div class="form-group mt-4">
                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-success">Autenticar</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>