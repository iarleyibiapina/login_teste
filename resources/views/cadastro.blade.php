<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<style>
    .container-form {
        width: 100vw;
        height: 100vh;

    }

    .endereco,
    .container-form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
    }

    .form-card {
        border: 1px solid black;
        padding: 20px
    }

    .error-cep {
        color: red;
    }
</style>

<body>
    <section class="container-form">
        <div class="form-card">
            <form action="" method="post">
                @csrf
                <label for="nome">Input aleatorio</label>
                <input type="text" name="nome" id="nome">

                <div class="endereco">
                    <legend>Endereço</legend>
                    {{--  --}}
                    <div class="input-form">
                        <label for="cep">Cep: </label>
                        <input type="number" name="cep" id="cep">
                        <legend class="error-cep"></legend>
                    </div>
                    <div class="input-form">
                        <label for="logradouro"> Logradouro: </label>
                        <input type="text" name="logradouro" id="logradouro">
                    </div>
                    <div class="input-form">
                        <label for="localidade"> Cidade: </label>
                        <input type="text" name="localidade" id="localidade">
                    </div>
                    <div class="input-form">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="bairro">
                    </div>
                    <div class="input-form">
                        <label for="uf"> UF: </label>
                        <input type="text" name="uf" id="uf">
                    </div>
                    <div class="input-form">
                        <label for="numero"> Numero: </label>
                        <input type="text" name="numero"i=numero">
                    </div>
                    {{--  --}}


                </div>
            </form>
        </div>
    </section>

    {{-- enviar dados vias ajax com jquer e retornar as resposta nos values --}}

    <script script>
        // ao perder o foco no input, fazer consulta ajax
        $("#cep").on("focusout", function() {
            let cepDigitado = this.value;
            $.ajax({
                    url: "{{ route('cadastroCep') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "cepDigitado": cepDigitado,
                    },
                    // success: function(response) {
                    //     $('input[name=logradouro]').val(response.logradouro);
                    //     $('input[name=localidade]').val(response.localidade);
                    //     $('input[name=bairro]').val(response.bairro);
                    //     $('input[name=uf]').val(response.uf);
                    // },
                })
                .done(function(response) {
                    $('input[name=logradouro]').val(response.logradouro);
                    $('input[name=localidade]').val(response.localidade);
                    $('input[name=bairro]').val(response.bairro);
                    $('input[name=uf]').val(response.uf);
                })
                .fail(function(response) {
                    let resp = (response.responseText);
                    $(".error-cep").text(`${response.responseText}`);
                });
        })
    </script>
</body>

</html>
