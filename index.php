<?php
require_once('./conexao/conexao.php');

$foodSelect = $Con->query("SELECT * FROM food");



function formatMoney($number, $cents = 1)
{ // cents: 0=never, 1=if needed, 2=always
    if (is_numeric($number)) { // a number
        if (!$number) { // zero
            $money = ($cents == 2 ? '0.00' : '0'); // output zero
        } else { // value
            if (floor($number) == $number) { // whole number
                $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
            } else { // cents
                $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
            } // integer or decimal
        } // value
        return 'R$: ' . $money;
    } // numeric
} // formatMoney




//var_dump($products);

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WhatsFood">
    <meta name="author" content="weslley">
    <meta property="og:image" content="https://pbs.twimg.com/profile_images/564976605479460865/6ZgfAF6b.png">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="icon" href="./assets/img/whatsfood.png">

    <title>WhatsFood</title>

    <link rel="canonical" href="https://weslleymendes.com.br/whatsFood">
    <!-- CSS para impressão -->
    <link rel="stylesheet" type="text/css" href="./assets/css/print.css" media="print" />

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./form-validation.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="#">WhatsFood</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link " href="./"><i class="fa fa-book"></i> Cardápio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="./view/login">
                            <i class="fa fa-user"></i> Login
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="py-5 text-center printd">
            <img class="d-block mx-auto mb-4" src="./assets/img/icone2.png" alt="" width="350" height="200">
            <h2>WhatsFood</h2>
            <p class="lead">Para melhor lhe atender preencha o formulario a baixo: </p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4" id="InfoPedido">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Total de pedido(s)</span>
                    <span class="badge badge-secondary badge-pill" id="qtdPedido"></span>
                </h4>
                <ul class="list-group mb-3" id="listPedidos">
                </ul>
            </div>
            <div class="col-md-8 order-md-1" id="alT">
                <h4 class="mb-3 printd">Preencha o formulário </h4>
                <form class="needs-validation" novalidate action="./controller/FinalizarPedido.php" method="POST">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nome</label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Digite seu nome" value="" required>
                            <div class="invalid-feedback">
                                Nome é Obrigatório!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Sobrenome</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Digite seu sobrenome" value="" required>
                            <div class="invalid-feedback">
                                Sobrenome é Obrigatório!
                            </div>
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(DDD) 9XXXX-XXXX" value="" required maxlength="15">
                        <div class="invalid-feedback">
                            Celular é Obrigatório!
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Rua, bairro, lote, quadra e ponto de referência" required>

                        <div class="invalid-feedback">
                            Por favor entre com o endereço pois é Obrigatório!
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="ER">Entrega ou retirada no local:</label>

                            <select class="custom-select d-block w-100" name="ER" id="ER" required>
                                <option value="">Selecione</option>
                                <option value="entrega">Entrega</option>
                                <option value="retirada">Retirada no local</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor selecione a opção desejada!
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 mb-3">
                            <label for="local"><b>Bairros e taxas de entrega:</b></label>
                            <small class="text-muted">(Informe sua localidade para o calculo da taxa de
                                entrega!)</small>
                            <select class="custom-select d-block w-100" name="local" id="local" required>
                                <option value="">Selecione</option>
                                <option value="pqp">Parque Paulista</option>
                                <option value="newcamp">Nova Campinas</option>
                                <option value="sts">Santa Cruz da Serra</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor selecione a opção desejada!
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="row box">
                        <div class="album py-12 bg-light text-center" id="lanchecheck">
                            <ul class="col-md-12 ">
                                <?php
                                while ($row = $foodSelect->fetch_assoc()) {
                                ?>
                                    <li>
                                        <div class="col-md-12">
                                            <input type="checkbox" name="Pacote" id="cb<?php echo $row['id_food']; ?>" value="<?php echo $row['valor'] ?>" />
                                            <label for="cb<?php echo $row['id_food']; ?>" id="<?php echo $row['id_food']; ?>L" class="label">
                                                <img src="./assets/upload/img/food/<?php echo $row['img']; ?>" />
                                                <p><b name="preco" id="cb<?php echo $row['id_food']; ?>P"> <?php echo formatMoney($row['valor'], 2); ?></b></p>
                                                <p name="nome" id="cb<?php echo $row['id_food']; ?>N"><?php echo $row['nome']; ?></p>
                                                <small name="desc" class="text-muted" id="cb<?php echo $row['id_food']; ?>D">
                                                    <?php echo $row['descricao']; ?>
                                                </small>
                                            </label>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Selecione a forma de pagamento:</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input value="credito" id="credito" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="credito">Crédito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="debito" id="debito" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debito">Débito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="dinheiro" id="dinheiro" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="dinheiro">Dinheiro</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <hr class="mb-4">
                    <h4 class="mb-3">Já fez sua escolha de lanche?</h4>
                    <div class="d-block my-3">
                        
                        <div class="custom-control custom-radio">
                            <input value="sim" id="sim" name="radios" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="nao" id="nao" name="radios" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="nao">Não</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button id="finalizar" class="btn btn-primary btn-lg btn-block" type="submit">Finalizar Pedido</button>
                </form>
            </div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2018-2020 WZSI</p>
            <ul class="list-inline">
                <li class="list-inline-item printd"><a href="#">Privacy</a></li>
                <li class="list-inline-item printd"><a href="#">Terms</a></li>
                <li class="list-inline-item printd"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./controller/PedidoController.js"></script>
    <script src="./controller/printPedidos.js"></script>
    <script>
        var tel = document.getElementById('telefone');
        tel.setAttribute("onkeypress", "mascara(this)");

        function mascara(telefone) {
            if (telefone.value.length == 0) {
                telefone.value = '(' + telefone.value;
            }
            if (telefone.value.length == 3) {
                telefone.value = telefone.value + ') ';
            }
            if (telefone.value.length == 10) {
                telefone.value = telefone.value + '-';
            }

        }
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>