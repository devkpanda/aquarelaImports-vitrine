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
        <div class="flex justify-center items-center h-screen bg-gray-200">
            
            <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <div id="result"></div>
                <div class="flex justify-center items-center">
                    <img src="/app/views/images/logo2.png" alt="" class="w-24">
                </div>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Email</label>
                    <input type="text" id="email" class="border w-full text-base px-2 py-1 focus:outline-none focues:ring-0
                    focus-border-gray-200" placeholder="Insira o email...">
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Senha</label>
                    <input type="text" id="senha" class="border w-full text-base px-2 py-1 focus:outline-none focues:ring-0
                    focus-border-gray-200" placeholder="Insira a senha...">
                </div>
                <div class="flex justify-center items-center mt-4">
                    <button class="btn btn-default" id="login">Login</button>
                </div>
                
            </div>
        </div>



        <script>
       
            var email    = $("email").val;
            var password = $("password").val;
            const login  = document.getElementById("login");

            login.addEventListener("click", () => {
                //var login = $("login").val;
                // erro aq
                $.ajax ({
                    url: "teste.php",
                    method: "POST",
                    data: {
                        email: email,
                        password: password,
                        login: login
                    }, 
                    sucess: function(data) {
                        $("#result").html(data);
                    }
                });
            });

        
        </script>
    </body>
</html>
