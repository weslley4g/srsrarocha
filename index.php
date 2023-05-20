<?php
require_once('./conexao/conexao.php');

$foodSelectRefeicoes = $Con->query("SELECT * FROM food WHERE Categoria = 'Refeicoes'");
$foodSelectBebidas = $Con->query("SELECT * FROM food WHERE Categoria = 'Bebidas'");
$foodSelectSobremesas = $Con->query("SELECT * FROM food WHERE Categoria = 'Sobremesas'");
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
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WhatsFood">
    <meta name="author" content="weslley">
    
    <link rel="icon" href="./assets/img/img.png">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <title>WhatsFood</title>

    <link rel="canonical" href="https://wzsi.tech/whatsFood/">

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./form-validation.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">

        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./assets/img/img.png" alt="" width="250" height="250">
            <h1>WhatsFood</h1>
            <p class="lead"><b>Fique a vontade para fazer seu pedido.😊</b></p>
        </div>

        <div class="row">

            <div class="col-md-12 order-md-1" id="alT">

                <form class="needs-validation" novalidate action="./controller/FinalizarPedido.php" method="POST">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName"><strong>* Nome:</strong></label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Digite seu nome" value="" required>
                            <div class="invalid-feedback">
                                Nome é Obrigatório!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName"><strong>* Sobrenome:</strong></label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Digite seu sobrenome" value="" required>
                            <div class="invalid-feedback">
                                Sobrenome é Obrigatório!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="celular"><strong>* Celular:</strong></label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(DD) XXXXX-XXXX" maxlength="15" required>
                            <div class="invalid-feedback">
                                Celular é Obrigatório!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ER"><strong>* Entrega ou retirada no local:</strong></label>

                            <select class="custom-select d-block w-100" name="ER" id="ER" required>
                                <option value="">Selecione</option>
                                <option value="entrega">Entrega</option>
                                <option value="retirada no local">Retirada no local</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor selecione a opção desejada!
                            </div>
                        </div>

                        <div class="col-md-12 mb-3" id="Maps" hidden>

                            <label for="address"><strong>* CEP:</strong></label>
                            <input type="tel" class="form-control" name="cep" id="cep" onkeypress="$(this).mask('00.000-000')" ontouchstart="$(this).mask('00.000-000')" placeholder="Digite apenas o seu cep! ex: 35271589">
                            <label for="address"><strong>* Rua:</strong></label>
                            <input value="" type="text" class="form-control" name="rua" id="rua" placeholder="Digite apenas o nome da sua rua! ex: Rua sao luiz">

                            <div class="invalid-feedback">
                                Por favor entre com o endereço pois é Obrigatório!
                            </div>

                            <label for="local"><strong>* Bairro:</strong></label>

                            <input class="form-control" type="text" readonly name="local" id="local">


                            <div class="invalid-feedback">
                                Por favor selecione a opção desejada!
                            </div>

                            <label for="complemento"><strong>Complemento:</strong></label>
                            <small class="text-muted">Opcional</small>
                            <textarea class="form-control" id="complemento" name="complemento" rows="3"></textarea>
                            <br><br>
                            <div id="boxGeolocal" class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="localizacao">
                                            Para que a entrega seja feita
                                            em sua residência
                                            permita o acesso a sua
                                            localização atual clicando
                                            no botão <b>LOCALIZAÇÃO</b>.
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <a id="localizacao" class="btn buttonElement">
                                            <span class="btn-label">
                                                <i class="fas fa-map-marked-alt"></i>
                                            </span>
                                            Localização
                                        </a>
                                        <br>
                                        <input class="form-control" name="latLong" id="latLong" type="text" hidden>
                                        <br>
                                        <div class="invalid-feedback">
                                            <h6>* Por favor permita o acesso a sua localização!</h6>
                                        </div>
                                    </div>
                                    <!-- alerta de Sucesso -->
                                    <div id="mapaAlertSuccess" class="alert alert-success fadeblock" role="alert" hidden>
                                        Sua <strong>LOCALIZAÇÃO</strong>foi compartilhada com sucesso!
                                    </div>
                                    <!-- alerta de error -->
                                    <div id="mapaAlertDanger" class="alert alert-danger fadeblock" role="alert" hidden>
                                        Sua <strong>LOCALIZAÇÃO</strong>não pode ser compartilhada!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" id="lancheForm" name="lancheForm" hidden>
                    </div>
                    <hr class="mb-4">
                    <div class="row box">
                        <div class="album col-md-12 mb-2 text-center" id="lanchecheck">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Refeições</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bebidas</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Sobremesas</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <ul class="col-md-12 order-md-1 ">
                                        <div class="row">
                                            <?php
                                            while ($row = $foodSelectRefeicoes->fetch_assoc()) {
                                            ?>
                                                <div class="col-md-6 mb-2 col ">
                                                    <li>
                                                        <div class="col-md-12  ">
                                                            <input type="checkbox" name="Pacote" id="cb<?php echo $row['id_food']; ?>" value="<?php echo $row['valor'] ?>" />
                                                            <label for="cb<?php echo $row['id_food']; ?>" id="<?php echo $row['id_food']; ?>L" class="label">

                                                                <img class="card-img-top" src="./assets/upload/img/food/<?php echo $row['img']; ?>" />

                                                                <p class="card-title" name="nome" id="cb<?php echo $row['id_food']; ?>N">
                                                                    <strong><?php echo $row['nome']; ?></strong></p>
                                                                <p><b name="preco" id="cb<?php echo $row['id_food']; ?>P">
                                                                        <?php echo formatMoney($row['valor'], 2); ?></b></p>
                                                                <button type="button" class="coll descPedidos"><strong>Descrição</strong></button>
                                                                <div class="conteudo alert alert-success fadeIn">
                                                                    
                                                                <p name="desc" id="cb<?php echo $row['id_food']; ?>D">
                                                                        <?php echo $row['descricao']; ?>
                                                                </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <ul class="col-md-12 order-md-1 ">
                                        <div class="row">
                                            <?php
                                            while ($row = $foodSelectBebidas->fetch_assoc()) {
                                            ?>
                                                <div class="col-md-6 mb-2 col ">
                                                    <li>
                                                        <div class="col-md-12  ">
                                                            <input type="checkbox" name="Pacote" id="cb<?php echo $row['id_food']; ?>" value="<?php echo $row['valor'] ?>" />
                                                            <label for="cb<?php echo $row['id_food']; ?>" id="<?php echo $row['id_food']; ?>L" class="label">

                                                                <img class="card-img-top" src="./assets/upload/img/food/<?php echo $row['img']; ?>" />

                                                                <p class="card-title" name="nome" id="cb<?php echo $row['id_food']; ?>N">
                                                                    <?php echo $row['nome']; ?></p>
                                                                <p><b name="preco" id="cb<?php echo $row['id_food']; ?>P">
                                                                        <?php echo formatMoney($row['valor'], 2); ?></b></p>
                                                                <button type="button" class="coll descPedidos"><strong>Descrição</strong></button>
                                                                <div class="conteudo">
                                                                    <p name="desc" id="cb<?php echo $row['id_food']; ?>D">
                                                                        <?php echo $row['descricao']; ?>
                                                                    </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <ul class="col-md-12 order-md-1 ">
                                        <div class="row">
                                            <?php
                                            while ($row = $foodSelectSobremesas->fetch_assoc()) {
                                            ?>
                                                <div class="col-md-6 mb-2 col ">
                                                    <li>
                                                        <div class="col-md-12  ">
                                                            <input type="checkbox" name="Pacote" id="cb<?php echo $row['id_food']; ?>" value="<?php echo $row['valor'] ?>" />
                                                            <label for="cb<?php echo $row['id_food']; ?>" id="<?php echo $row['id_food']; ?>L" class="label">

                                                                <img class="card-img-top" src="./assets/upload/img/food/<?php echo $row['img']; ?>" />

                                                                <p class="card-title" name="nome" id="cb<?php echo $row['id_food']; ?>N">
                                                                    <?php echo $row['nome']; ?></p>
                                                                <p><b name="preco" id="cb<?php echo $row['id_food']; ?>P">
                                                                        <?php echo formatMoney($row['valor'], 2); ?></b></p>
                                                                <button type="button" class="coll descPedidos"><strong>Descrição</strong></button>
                                                                <div class="conteudo">
                                                                    <p name="desc" id="cb<?php echo $row['id_food']; ?>D">
                                                                        <?php echo $row['descricao']; ?>
                                                                    </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 order-md-2 mb-4" id="InfoPedido">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted"><strong>Total de pedido(s)</strong></span>
                                    <span class="badge badge-secondary badge-pill" id="qtdPedido"></span>
                                </h4>
                                <ul class="list-group mb-3" id="listPedidos">
                                </ul>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ObsL"><strong>Observação do(s) Pedido(s):</strong></label>
                                <small class="text-muted">Fique atento a <strong>descrição!</strong></small>
                                <textarea class="form-control" id="ObsL" name="ObsL" rows="4" placeholder="Descrição do Pedido."></textarea>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                    <hr class="mb-4">
                    <h4 class="mb-3 ">*Forma de pagamento:</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input value="Credito" id="credito" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="credito">Crédito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="Debito" id="debito" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debito">Débito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="Dinheiro" id="dinheiro" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="dinheiro">Dinheiro</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="Pix" id="Pix" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="Pix">PIX</label>
                        </div>
                    </div>
                    <div class=" input-group col-md-3 mb-3" id="boxtroco" hidden>
                        <label for="troco">Troco para quanto?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input id="troco" name="troco" type="tel" class="form-control" onkeypress="$(this).mask('0#0.0#', {reverse: true})" ontouchstart="$(this).mask(' ##0.00', {reverse: true})">
                            <input type="text" name="calcTroco" id="calcTroco" hidden readonly>
                            <div class="invalid-feedback">
                                Por favor informe o valor!
                            </div>
                        </div>
                        <div id="TrocoDanger" class="alert alert-danger fadeblock" role="alert" hidden>
                            O <b>VALOR</b> informado é menor do que o valor total da compra!
                        </div>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">*Realizou seu pedido?</h4>
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
                    <br>
                    <button id="finalizar" class="btn btn-primary btn-lg btn-block" type="submit"><strong>Finalizar
                            Pedido</strong></button>
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
        <a href="#" class="scrollToTop"><i class="fas fa-arrow-circle-up"></i></a>
    </div>
    <section hidden class="subscription-details js-subscription-details is-invisible">
        <p></p>
        <p><a href="https://web-push-codelab.glitch.me//"></p>
        <pre><code class="js-subscription-json"></code></pre>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>



    <script type="text/javascript" src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./controller/PedidoController.js"></script>
    <script type="text/javascript">
        // subir para o topo
        $(document).ready(function() {
            //Verifica se a Janela está no topo
            $(window).scroll(function() {
                if ($(this).scrollTop() > 2300) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });

            //Onde a mágia acontece! rs
            $('.scrollToTop').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 1000);
                return false;
            });

        });
        //Barrar campos só com espaços ou menos de 3 letras sem contar espaços
        $("#firstName").focusout(function() {
            namef = document.getElementById('firstName')

            if (namef.value.length === 0 || !namef.value.trim()) {
                document.getElementById('firstName').value = ""
            }
        });
        $("#lastName").focusout(function() {
            namel = document.getElementById('lastName')

            if (namel.value.length === 0 || !namel.value.trim()) {
                document.getElementById('lastName').value = ""
            }
        });
        // buscar endereco
        $("#cep").focusout(function() {
            //Início do Comando AJAX
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'https://viacep.com.br/ws/' + $(this).val().replace(/[^\d]+/g, '') + '/json/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function(resposta) {
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#rua").val(resposta.logradouro);
                    $("#local").val(resposta.bairro);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    $("#adress").focus();
                }
            });
        });
        // mascara telefone
        var tel = document.getElementById('telefone');
        tel.onkeypress = function() {
            mascara(this)
        }
        tel.ontouchstart = function() {
            mascara(this)
        }

        $("#telefone").focusout(function() {
            var validtel = document.getElementById('telefone').value;
            if (validtel == "(00) 00000-0000") {
                document.getElementById('telefone').value = ''
            }
        })

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
                            window.scrollTo(0, 0);
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        // mascara troco
    </script>
</body>

</html>