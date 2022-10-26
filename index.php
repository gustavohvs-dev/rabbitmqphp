<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RabbitMQ - Send Messages</title>
    <link rel="shortcut icon" href="public/ico.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container">
    <h1 class="text-center my-5">RabbitMQ - Send Messages</h1>
    <div class="alert alert-primary" role="alert">
        Preencha o formulário para enviar uma mensagem
    </div>
    <form>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome">
        </div>
        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" id="mensagem" rows="3"></textarea>
        </div>
        <button id="submit" type="button" class="btn btn-primary mt-3">Enviar mensagem</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $("#submit").on('click', function(event) {
        axios.post('./send.php', {
            nome: $("#nome").val(),
            mensagem: $("#mensagem").val()
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({
                title: 'Mensagem enviada',
                text: 'Mensagem enviada com sucesso',
                icon: 'success',
                confirmButtonText: 'Ok!'
            })
        })
        .catch(function (error) {
            console.log(error);
            Swal.fire({
                title: 'Falha ao enviar',
                text: 'Por favor, entre em contato com o suporte',
                icon: 'error',
                confirmButtonText: 'Ok!'
            })
        });
    });
});
</script>
    
</body>
</html>