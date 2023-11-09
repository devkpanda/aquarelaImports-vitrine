<?php

use models\User;

function listUsers(){
    $user = new User(0, '', '', '', '', '', '', '');
    $rows = $user->listUsuarios();

    foreach ($rows as $row) {
        echo "<tr>";
            echo "<th></th>";
            echo "<td>
                    <div class='flex items-center space-x-3'>
                        <div>
                            <div class='font-bold'> " . $row['name'] . "</div>
                            <div class='text-sm opacity-50'>" . ( $row['idNivelUsuario'] == 1 ? "Administrador" : "Funcionario" ) . "</div>
                        </div>
                    </div>
                </td>";
                echo ""
        echo "</tr>";
    }
}

// CORS Request to get the html page

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  header('HTTP/1.1 200 OK');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Administrador</title>
</head>

<body>

        <div class="w-full min-h-screen font-sans text-gray-900 bg-gray-50 flex">
          <aside class="py-6 px-18 w-64 border-r border-gray-200">
              <div class="flex justify-center items-center">
              <img src="/app/views/images/logo2.png" alt="" class="w-28">
            </div>

            <div class="ml-4">
             <ul v-for="group in sidebar" class="flex flex-col gap-y-6 pt-20 ">
                    <li v-for="item in group">
                        <a href="#" onclick="home()" id="home_btn" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" id="ad_btn" onclick="ad()" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            Anúncios
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="user()" id="usr_btn" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#c0bfbc}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                            Usuários
                        </a>
                    </li>
                 <!--   <li>
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 640 512"><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                            Pedidos
                        </a>
                    </li> -->
                </ul>

            </div>
          </aside>

            <main class="flex-l w-full ">

                <div class="flex flex-col">
                  <div class="flex items-center justify-between py-7 px-10">
                      <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Administrador</h1>
                      <p class="text-sm font-medium text-gray-500">Administre sua página aqui.</p>
                      
                        <a href="#" onclick="logout1.showModal()" class="flex gap-x4 py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#c0bfbc}</style><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            Logout
                        </a>
                   
                  </div>
                </div>

                <div class="hidden flex flex-col" id="ad_nav">
                  <ul class="flex justify-center items-center gap-x-24 px-4 border-y border-gray-200">
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="search_btn">
                            Pesquisar
                        </button>
                    </li>
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="add_btn">
                            Adicionar
                        </button>
                    </li>
                    </li>
                  </ul>
                </div>

                <div class="hidden flex flex-col" id="usr_nav">
                  <ul class="flex justify-center items-center gap-x-24 px-4 border-y border-gray-200">
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="list_btn">
                            Listar
                        </button>
                  </ul>
                </div>

               
               
                    <div class="hidden flex justify-center mt-10" id="ad_search">
                        <div class="flex justify-center shadow-xl grid gp-10 bg-white rounded-[10px] p-[3rem] h-50 w-10/12" >
                            <form action="" class="w-12/12 ">
                                <div class="flex justify-center">
                                        <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Pesquise o anúncio</h1>
                                </div>
                                    <div class="m-4 flex flex-row justify-center rounded-[8px] bg-white p-5 ">
                                        <div class="join">
                                            <div>
                                                <div>
                                                    <input class="input input-bordered join-item" placeholder="Insira o nome.."/>
                                                </div>
                                            </div>
                                            <select class="select select-bordered join-item">
                                                <option disabled selected>Categoria</option>
                                                <option>Categoria</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <div class="indicator">
                                                <button class="btn join-item">Pesquisar</button>
                                            </div>
                                        </div>
                             </form>
                        </div>
                    
                    <div class="flex flex-col">
                        <div class="overflow-x-auto my-4 flex justify-center">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Tamanho</th>
                                    <th>Peso</th>
                                    <th>Video Url</th>
                                    <th>Foto (base64)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- row 1 -->
                                <tr>
                                <tr class="hover">
                                    <th>1</th>
                                    <td>Conjunto Freio à disco</td>
                                    <td>Conjunto de instalação de freio à disco para bicicletas. Contendo dois discos, duas pinças com quatro pastilhas, dois cabos com conduites</td>
                                    <td>R$150</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="flex justify-">
                                            <div>
                                                <button onclick="ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                    </td>
                                </tr>
                                <!-- row 2 -->
                                <tr class="hover">
                                    <th>2</th>
                                    <td>Coroa</td>
                                    <td>Coroa convencional para bicicletas sem marcha. 44 dentes</td>
                                    <td>R$150</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="flex justify-between">
                                            <div>
                                                <button onclick="ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                    </td>
                                </tr>
                                <!-- row 3 -->
                                <tr>
                                <tr class="hover">
                                    <th>3</th>
                                    <td>Pedivela</td>
                                    <td>Pedivila convencional de alumínio, 44mm</td>
                                    <td>R$150</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="flex justify-between">
                                            <div>
                                                <button onclick="ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                    </td>
                                </tr>
                                </tbody>
                                    </div>
                            </table>
                        </div>
                    </div>    
                    <div class="mt-6 flex justify-center">
                        <input type="radio" name="radio-8" class="radio radio-error mr-4" checked />
                        <input type="radio" name="radio-8" class="radio radio-error" />
                    </div>
                    
                </div>
                </div>


                        <div class="hidden flex justify-center mt-5" id="usr_tbl">
                        <div class="flex justify-center shadow-xl grid gp-10 bg-white rounded-[10px] p-[3rem] h-50 w-10/12">
                            <table class="table">
                                    <!-- head -->
                                    <thead>
                                    <tr>
                                        <th>
                                        </th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Ativo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    <tr>
                                        <th>
                                        </th>
                                        <td>
                                        <div class="flex items-center space-x-3">
                                            <div>
                                            <div class="font-bold">Carlos Eduardo</div>
                                            <div class="text-sm opacity-50">Administrador</div>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                        adm@gmail.com
                                        </td>
                                        <td>
                                        S
                                        </td>
                                        <td class="flex mt-4">
                                            <div>
                                                <button onclick="user_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="user_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- row 2 -->
                                    <tr>
                                        <th>
                                        </th>
                                        <td>
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar">
                                            
                                            </div>
                                            <div>
                                            <div class="font-bold">Jhonnata Lorusso</div>
                                            <div class="text-sm opacity-50">Funcionário</div>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                        fun@gmail.com
                                        </td>
                                        <td>
                                        N
                                        </td>
                                        <td class="flex mt-4">
                                            <div>
                                                <button onclick="user_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="user_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- row 3 -->
                                    <tr>
                                        <th>
                                        </th>
                                        <td>
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar">
                                            
                                            </div>
                                            <div>
                                            <div class="font-bold">Fulano</div>
                                            <div class="text-sm opacity-50">Funcionário</div>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                        fun@gmail.com
                                        </td>
                                        <td>
                                        S
                                        </td>
                                        <td class="flex mt-4">
                                           <div>
                                                <button onclick="user_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="user_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- row 4 -->
                                    <tr>
                                        <th>
                                        </th>
                                        <td>
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar">
                                            
                                            </div>
                                            <div>
                                            <div class="font-bold">Fulano</div>
                                            <div class="text-sm opacity-50">Funcionário</div>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                        fun@gmail.com
                                        </td>
                                        <td>
                                        S
                                        </td>
                                        <td class="flex mt-4">
                                            <div>
                                                <button onclick="user_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                            </div>
                                            <div>
                                                <button onclick="user_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    

                <!-- forms/modals -->
                <!-- users -->


                <!-- advertisement -->
                <div class="hidden flex justify-center m-4" id="ad_add">
                    <div class="w-8/12 mr-4 ml-8">
                        <div class="flex justify-center">
                            <div class="avatar">
                                <div class="w-24 rounded-full mt-4 -my-12 lg:shadow">
                                    <img src="/app/views/images/list-icon.jpg" class="" />
                                </div>
                            </div>
                        </div> 
                        <div class="p-6 shadow-lg bg-white rounded-lg">
                            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Inserir</h1>
                            <hr class="mt-4 w-full">
                        <form action="" class="grid grid-cols-2 gap-4 mt-6 ml-24 ">
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Nome</label>
                                <input type="text" placeholder="Digite o nome.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Descrição</label>
                                <input type="text" placeholder="Digite a descrição.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Preço</label>
                                <input type="text" placeholder="Digite o preço.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Id da Categoria</label>
                                <input type="text" placeholder="Digite o Id.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Peso</label>
                                <input type="text" placeholder="Digite o peso.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>

                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Tamanho</label>
                                <input type="text" placeholder="Digite o tamanho.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Url</label>
                                <input type="text" placeholder="Digite a Url.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>

                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Foto</label>
                                <input type="file" class="file-input file-input-bordered file-input-bg-orange-500 w-full max-w-xs bg-gray-100" />
                            </div>

                            <div class="flex justify-center items-center mt-6 ml-96">
                                <button class="btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Submit</button>
                            </div>
                        </form>

                            <div class="hidden">
                                <div class="alert alert-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>Seu anúncio foi inserido!</span>
                                </div>
                            </div>
                    </div>
                </div>  
                </div>

                <!-- modal update (ad) -->
                    <dialog id="ad_update" class="modal">
                        <div class="modal-box w-11/12">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <div class="w-12/12">
                            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Editar</h1>
                                <hr class="mt-4 w-full">
                            <form action="" class="grid grid-cols-2 gap-4 ">
                            <div class="mt-3">
                                    <label for="email" class="block text-base mb-2">Id</label>
                                    <input type="text" placeholder="Id" class="input input-bordered w-full max-w-xs" disabled />
                                </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Nome</label>
                                <input type="text" placeholder="Digite o nome.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Descrição</label>
                                <input type="text" placeholder="Digite a descrição.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Preço</label>
                                <input type="text" placeholder="Digite o preço.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base">Categoria</label>
                                <select class="select select-bordered join-item w-full mt-2">
                                                    <option disabled selected>Categoria</option>
                                                    <option>S</option>
                                                    <option>N</option>
                                </select>
                            </div>
                            
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Peso</label>
                                <input type="text" placeholder="Digite o peso.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>

                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Tamanho</label>
                                <input type="text" placeholder="Digite o tamanho.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Url</label>
                                <input type="text" placeholder="Digite a Url.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>

                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Foto</label>
                                <input type="file" class="file-input file-input-bordered file-input-bg-orange-500 w-full max-w-xs bg-gray-100" />
                            </div>

                            <div class="flex justify-center items-center mt-10 ">
                                <button class="btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Submit</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </dialog>

                    <!-- modal delete (ad) -->

                    <dialog id="ad_delete" class="modal">
                        <div class="modal-box">
                        <h3 class="font-bold text-lg">Deseja mesmo deletar esse anúncio?</h3>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Sim</button>
                                <button class="btn">Não</button>
                            </form>
                        </div>
                        </div>
                    </dialog>

                    <!-- modal update (user) -->
                    <dialog id="user_update" class="modal">
                        <div class="modal-box w-11/12">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <div class="w-12/12">
                            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Editar</h1>
                                <hr class="mt-4 w-full">
                            <form action="" class="grid grid-cols-2 gap-4 ">
                                <div class="mt-3">
                                    <label for="email" class="block text-base mb-2">Id</label>
                                    <input type="text" placeholder="Id" class="input input-bordered w-full max-w-xs" disabled />
                                </div>
                            <select class="select select-bordered join-item mt-11">
                                                <option disabled selected>Nível Usuário</option>
                                                <option>Administrador</option>
                                            </select>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">Nome</label>
                                <input type="text" placeholder="Digite o nome.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <div class="mt-3">
                                <label for="email" class="block text-base mb-2">E-mail</label>
                                <input type="text" placeholder="Digite o e-mail.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                            </div>
                            <select class="select select-bordered join-item mt-3">
                                                <option disabled selected>Ativo</option>
                                                <option>S</option>
                                                <option>N</option>
                                            </select>
                            <div class="flex justify-center items-center mt-3 ">
                                <button class="btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Submit</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </dialog>

                    <!-- model delete (user) -->
                    <dialog id="user_delete" class="modal">
                        <div class="modal-box">
                        <h3 class="font-bold text-lg">Deseja mesmo deletar esse usuário?</h3>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Sim</button>
                                <button class="btn">Não</button>
                            </form>
                        </div>
                        </div>
                    </dialog>
                    

                    <!-- modal logout -->
                    <dialog id="logout1" class="modal">
                        <div class="modal-box">
                        <h3 class="font-bold text-lg">Deseja mesmo sair?</h3>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Sim</button>
                                <button class="btn">Não</button>
                            </form>
                        </div>
                        </div>
                    </dialog>

                    
              </main>
              
        <script>

            function ad() {
               
                ad_nav.classList.remove("hidden");
                ad_search.classList.add("hidden");
                ad_add.classList.add("hidden");
                usr_nav.classList.add("hidden");
                usr_tbl.classList.add("hidden");


                   
                search_btn.addEventListener("click", function () {
                   ad_search.classList.remove("hidden");
                   ad_add.classList.add("hidden");
                });

                add_btn.addEventListener("click", function () {
                   ad_add.classList.remove("hidden");
                   ad_search.classList.add("hidden");
                });
            }


            function home () {
                    ad_nav.classList.add("hidden");
                    usr_nav.classList.add("hidden");
                    ad_add.classList.add("hidden");
                    usr_tbl.classList.add("hidden");
                    ad_search.classList.add("hidden");
            }

            function user () {
                    ad();

                    usr_nav.classList.remove("hidden");
                    ad_nav.classList.add("hidden");

                    list_btn.addEventListener("click", function () {
                        usr_tbl.classList.remove("hidden");
                    });
                   
                    
            }
       
          

        </script>
</body>
</html>