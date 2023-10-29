<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script> 
        <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <title>Login</title>
    </head>

    <body>
        <div class="flex justify-center items-center h-screen bg-gray-200 rounded-md">
            <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            
                <div id="result"></div>
                <form id="login">
                    <div class="flex justify-center items-center">
                        <img src="/app/views/images/logo2.png" alt="" class="w-24">
                    </div>
                    <hr class="mt-3">
                    <div class="mt-3">
                        <label for="email" class="block text-base mb-2">Email</label>
                        <input type="text" id="email" name="email" class="rounded-md bg-white border w-full text-base px-2 py-1 focus:outline-none focues:ring-0
                        focus-border-gray-200" placeholder="Insira o email...">
                    </div>

                    <div class="mt-3">
                        <label for="email" class="block text-base mb-2">Senha</label>
                        <input type="text" id="password" name="password" class="rounded-md bg-white border w-full text-base px-2 py-1 focus:outline-none focues:ring-0
                        focus-border-gray-200" placeholder="Insira a senha...">
                    </div>
                    <div class="flex justify-center items-center mt-4">
                        <input type="submit" class="btn btn-default bg-white hover:bg-gray-100 font-black border-gray-300" id="login" value="login">
                        <span id="login-loading" class="mx-10 loading loading-spinner loading-lg"></span>
                    </div>
                </form>
            </div>
        </div>



        <script>
            $("#login-loading").hide()
       
            /* 
            var email    = $("#email").val();
            var password = $("#password").val();
            //const login  = document.getElementById("login");

            $(document).on("click", "#login", function(e){
                $("#login-loading").fadeIn(100)
                e.preventDefault();
                // /app/controllers/teste.php
                 $.ajax ({
                    url: "127.0.0.1/login/auth",
                    type: "post",
                    data: {
                        email: email,
                        password: password
                    }, 
                    sucess: function(response) {
                        var data = JSON.parse(response);
                        $("#result").html(data);
                    }
                }); 
            }); 
            */

            document.addEventListener("DOMContentLoaded", function(){
                document.getElementById("login").addEventListener("submit", function(event){
                    event.preventDefault();

                    $("#login-loading").fadeIn(100)

                    const formData = new FormData(this);

                    if (formData.has("email") && formData.has("password")){
                        fetch("http://127.0.0.1/login/auth", {
                            method: "POST",
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify({
                                email: formData.get("email"),
                                password: formData.get("password")
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erro na solicitação. Código de status: ' + response.status);
                            }
                            return response.text();
                        })
                        .then(text => {
                            $("#result").html("Resposta do servidor:", text); // Depuração
                            const data = JSON.parse(text); // Tentar analisar o texto como JSON
                            $("#result").html("Dados analisados:", data); // Depuração
                            // Resto do seu código
                        })
                        .then(data => {
                            $("#result").html(data)
                            $("#login-loading").hide(100)
                        })
                        .catch(error => {
                            $("#result").html(error)
                        })
                    } else if (!formData.has("email") && formData.has("password")) {
                        $("#login-loading").hide(100)
                        $("#result").html("<p class='text-red-500'> Por Favor Insira seus dados<p>")
                    } else if (formData.has("email") && !formData.has("password")){
                        $("#login-loading").hide(100)
                        $("#result").html("<p class='text-red-500'> Por Favor Insira seus dados<p>")
                    } else {
                        $("#login-loading").hide(100)
                        $("#result").html("<p class='text-red-500'> Por Favor Insira seus dados<p>")
                    }

                })
            })
        
        </script>
    </body>
</html>
