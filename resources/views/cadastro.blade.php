<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" --}}
    {{-- integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
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
</style>

<body>
    <section class="container-form">
        <div class="form-card">
            <form action="" method="post">
                <label for="nome">Input aleatorio</label>
                <input type="text" name="nome" id="nome">

                <div class="endereco">
                    <legend>Endereço</legend>
                    <label for="cep">Cep:</label>
                    <input type="text" name="cep" id="cep">
                    <label for="logradouro">Logradouro:</label>
                    <input type="text" name="logradouro" id="logradouro">
                    <label for="localidade">Cidade:</label>
                    <input type="text" name="localidade" id="localidade">
                    <label for="uf">UF:</label>
                    <input type="text" name="uf" id="uf">
                    <label for="numero">Numero:</label>
                    <input type="text" name="numero" id="numero">
                </div>
            </form>
        </div>
    </section>

    {{-- enviar dados vias ajax com jquer e retornar as resposta nos values --}}
</body>

</html>
