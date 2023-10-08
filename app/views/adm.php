<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" /> -->
    <title>Administrador</title>
</head>

<body>

    <div class="card w-96 bg-base-100 shadow-xl  items-center mx-auto indicator-item indicator-center indicator-middle">
    <div class="flex flex-col w-full lg:flex-row mt-3">
        <div class="grid flex-grow card rounded-box place-items-center">

            <p class="mt-3">Id do anúncio:</p>
            <input type="text" placeholder="Digite o ID" id="advertisement_id" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Nome:</p>
            <input type="text" placeholder="Digite o nome" id="name" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Descrição:</p>
            <input type="text" placeholder="Digite a descrição" id="description" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Preço:</p>
            <input type="text" placeholder="Digite o preço" id="price" class="input input-bordered w-30 max-w-xs" />

            <p class="mt-3">Id da categoria:</p>
            <input type="text" placeholder="Digite a categoria" id="category_id" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Id da subcategoria:</p>
            <input type="text" placeholder="Digite a sub categoria" id="sub_category_id" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Medida:</p>
            <input type="text" placeholder="Digite a medida" id="measurement" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Tamanho:</p>
            <input type="text" placeholder="Digite o tamanho" id="size" class="input input-bordered w-30 max-w-xs mt-3" />

            <p class="mt-3">Video url:</p>
            <input type="text" placeholder="Digite a url" id="videoUrl" class="input input-bordered w-30 max-w-xs mt-3" />

            <button id="submit" onclick="Submit()" class="btn btn-warning mt-3">INSERIR</button>

        </div> 
</body>
<script src="/Jquery/jquery-3.5.1.min.js"></script>
<script src="assets/script.js"></script>

</html>