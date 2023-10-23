<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script> 
        <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
        <title>Login</title>
    </head>

    <body>
        <div class="flex justify-center items-center h-screen bg-gray-200">
            <div class="w-96 p-6 shadow-lg bg-white rounded-md">
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
                    <button class="btn btn-default">Login</button>
                </div>
                
            </div>
        </div>
    </body>
</html>
