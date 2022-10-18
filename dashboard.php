<?php

require_once "./app/Database/Database.php";
require_once "./app/Repository/PeopleRepository.php";

$repository = new PeopleRepository(new Database);

$fetchAllPeople = $repository->fetchAll();

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIANLUCA PETTENON: Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <div class="col-lg-12 pt-5">

            <div class="card">

                <div class="card-body">

                    <div class="mb-2">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userModal">Cadastrar</button>
                    </div>

                    <table class="table">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Nascimento</th>
                                <th>Estado</th>
                                <th>Endere&ccedil;o</th>
                                <th>G&ecirc;nero</th>
                                <th>Cart&atilde;o</th>
                                <th>A&ccedil;&otilde;es</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($fetchAllPeople as $row) : ?>
                                <tr>
                                    <td><?= $row["id"] ?></td>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["mail"] ?></td>
                                    <td><?= $row["birthday"] ?></td>
                                    <td><?= $row["namestate"] ?></td>
                                    <td><?= $row["address"] ?></td>
                                    <td><?= $row["namegenre"] ?></td>
                                    <td><?= $row["creditcard"] ?></td>
                                    <td><button class="btn btn-warning" onclick="editRegister(<?= addslashes($row["id"]) ?>)">Editar</button> <button class="btn btn-danger" onclick="deleteRegister(<?= addslashes($row["id"]) ?>)">Deletar</button></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="userModal" data-bs-backdrop="static" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <form id="formUser" action="app/Action/Action.php" method="POST" autocomplete="off">

                        <input type="hidden" name="action" id="action" value="insert">
                        <input type="hidden" name="id" id="id" value="">

                        <div class="form-group">
                            <label for="name" class="form-label">Nome completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="mail" class="form-label">E-mail <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="mail" name="mail" placeholder="E-mail" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="birthday" class="form-label">Data de nascimento <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Data de nascimento" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="state" class="form-label">Estado <span class="text-danger">*</span></label>
                            <select id="state" name="state" class="form-control">
                                <option></option>
                                <option value="PR">Paran&aacute;</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="RS">Rio Grande do Sul</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="address" class="form-label">Endere&ccedil;o <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" required>
                        </div>

                        <div class="form-group mt-2">

                            <label for="genre" class="form-label">G&ecirc;nero <span class="text-danger">*</span></label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genre" value="F">
                                <label class="form-check-label">Feminino</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genre" value="M">
                                <label class="form-check-label">Masculino</label>
                            </div>

                        </div>

                        <div class="form-group mt-2">

                            <label for="sex" class="form-label">Cart&atilde;o de cr&eacute;dito <span class="text-danger">*</span></label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="creditcard" value="Visa">
                                <label class="form-check-label">Visa</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="creditcard" value="Mastercard">
                                <label class="form-check-label">Mastercard</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="creditcard" value="Elo">
                                <label class="form-check-label">Elo</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="creditcard" value="DinersClub">
                                <label class="form-check-label">Diners Club</label>
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" id="btnClear" class="btn btn-lg btn-warning">Limpar</button>
                    <button type="button" id="btnSubmit" class="btn btn-lg btn-success">Salvar</button>
                </div>

            </div>
        </div>
    </div>

    <?php require_once "./include/footer.php" ?>
    <script src="assets/my/js/dashboard.js"></script>

</body>

</html>