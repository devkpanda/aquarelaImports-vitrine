<?php

// CORS Request to get the html page

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit;
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['idNivelUsuario'])) {
    header("Location: https://aquarelaimports.hostdeprojetosdoifsp.gru.br/login");
}

?>

<!DOCTYPE html>
<html data-theme="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Administrador</title>
</head>

<body>

    <div class="w-full min-h-screen font-sans text-gray-900 bg-gray-50 md:flex">
        <aside class="border-b md:border-b-0 md:py-6 px-18 w-full md:w-64 border-r border-gray-200 flex-shrink-0">
            <div class="flex justify-center items-center">
                <img src="/app/views/images/logo2.png" alt="" class="w-28">
            </div>

            <div class="ml-4">
                <ul class="flex md:flex-col gap-x-6 gap-y-6 md:pt-20 py-4">
                    <li>
                        <a href="#" onclick="home()" id="home_btn" class="md:w-full flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 576 512">
                                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" id="ad_btn" onclick="ad()" class="md:w-full flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                            </svg>
                            Anúncios
                        </a>
                    </li>
                    <li>
                        <a href="#" id="category_btn" onclick="category()" class="md:w-full flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                            </svg>
                            Categorias
                        </a>
                    </li>
                    <li>
                        <a href="#" id="order_btn" onclick="order()" class="md:w-full flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                            </svg>
                            Pedidos
                        </a>
                    </li>
                    <?php if ($_SESSION['idNivelUsuario'] == 1) : ?>
                        <li>
                            <a href="#" onclick="user()" id="usr_btn" class="md:w-full flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1 fill-[#c0bfbc]" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                                Usuários
                            </a>
                        </li>
                    <?php endif; ?>
                    <!--   <li>
                        <a href="#" class="md:w-full flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
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
                    <div className="flex items-center justify-between">
                        <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Administrador</h1>
                        <p class="text-sm font-medium text-gray-500">Administre sua página aqui.</p>
                    </div>
                    <a href="#" onclick="logout1.showModal()" class="flex gap-x4 py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c0bfbc
                                }
                            </style>
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                        </svg>
                        Logout
                    </a>

                </div>
            </div>

            <!-- navigation bars -->

            <div class="hidden flex flex-col" id="ad_nav">
                <ul class="flex justify-center items-center gap-x-24 px-4 border-y border-gray-200">
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="search_btn">
                            Listar
                        </button>
                    </li>
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="add_btn">
                            Adicionar
                        </button>
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

            <div class="hidden flex flex-col" id="category_nav">
                <ul class="flex justify-center items-center gap-x-24 px-4 border-y border-gray-200">
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="category_list_btn">
                            Listar
                        </button>
                    </li>
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="category_add_btn">
                            Adicionar
                        </button>
                    </li>
                </ul>
            </div>

            <div class="hidden flex flex-col" id="order_nav">
                <ul class="flex justify-center items-center gap-x-24 px-4 border-y border-gray-200">
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500" id="order_list_btn">
                            Listar
                        </button>
                </ul>
            </div>


            <?php include "components/search_ad.php" ?>

            <?php include "components/category.php" ?>

            <?php include "components/order.php" ?>

            <?php include "components/users.php" ?>

            <!-- forms/modals -->
            <!-- users -->

            <!-- category -->
            <?php include "components/category_add.php" ?>
            <?php include "components/category_update.php" ?>
            <?php include "components/category_delete.php" ?>


            <!-- advertisement -->
            <?php include "components/ad_add.php" ?>
            <?php include "components/ad_update.php" ?>
            <?php include "components/ad_delete.php" ?>

            <!-- modal update (user) -->
            <?php include "components/edit_user.php" ?>

            <!-- model delete (user) -->
            <?php include "components/delete_user.php" ?>

            <!-- order delete -->
            <?php include "components/order_delete.php" ?>

            <!-- modal logout -->
            <dialog id="logout1" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Deseja mesmo sair?</h3>
                    <div class="modal-action">
                        <form method="dialog">
                            <button id="btn_logoff" class="btn" onclick="logoff()">Sim</button>
                            <button class="btn">Não</button>
                        </form>
                    </div>
                </div>
            </dialog>

            <script>
                var editUserModal
                var editCategoryModal
                var editOrderModal

                var deleteUserId

                function logoff() {
                    btn_logoff.addEventListener("click", function() {
                        window.location.reload()
                        <?php $_SESSION['idUsuario'] = "";
                        $_SESSION['idNivelUsuario'] = "" ?>
                    })
                }

                function reset() {
                    ad_nav.classList.add("hidden");
                    usr_nav.classList.add("hidden");
                    ad_add.classList.add("hidden");
                    usr_tbl.classList.add("hidden");
                    ad_search.classList.add("hidden");
                    category_add.classList.add("hidden")
                    category_search.classList.add('hidden')
                    category_nav.classList.add('hidden')
                    order_search.classList.add('hidden')
                    order_nav.classList.add('hidden')
                }


                function ad() {
                    reset()
                    ad_nav.classList.remove("hidden");

                    search_btn.addEventListener("click", function() {
                        ad_search.classList.remove("hidden");
                        ad_add.classList.add("hidden");

                        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/listall')
                            .then((response) => response.json())
                            .then((response) => displayAds(response))
                    });

                    add_btn.addEventListener("click", function() {
                        ad_add.classList.remove("hidden");
                        ad_search.classList.add("hidden");
                    });
                }

                function home() {
                    reset()
                }

                function category() {
                    reset()

                    category_nav.classList.remove('hidden')

                    category_list_btn.addEventListener('click', function() {
                        fetchAndDisplayCategories()
                        category_search.classList.remove('hidden')
                        category_add.classList.add("hidden");
                    })

                    category_add_btn.addEventListener('click', function() {
                        category_add.classList.remove("hidden");
                        category_search.classList.add('hidden')
                    })
                }

                function order() {
                    reset()
                    order_nav.classList.remove('hidden')

                    order_list_btn.addEventListener('click', function() {
                        order_search.classList.remove('hidden')

                        fetchAndDisplayOrders()
                    })
                }

                function user() {
                    reset()

                    usr_nav.classList.remove("hidden");

                    list_btn.addEventListener("click", function() {
                        usr_tbl.classList.remove("hidden");

                        fetch("https://aquarelaimports.hostdeprojetosdoifsp.gru.br/user/listall", {
                                method: "GET",
                                headers: {
                                    'Origin': 'https://aquarelaimports.hostdeprojetosdoifsp.gru.br',
                                    'Access-Control-Request-Method': 'GET',
                                    'Access-Control-Request-Headers': 'X-Requested-With, Content-Type',
                                }
                            })
                            .then((response) => response.json())
                            .then((response) => {
                                const roles = {
                                    1: "Administrador",
                                    2: "Funcionário"
                                }

                                listusers.innerHTML = response.map(user => {
                                    const userActive = user.active === 0 ? "Não" : "Sim"

                                    return `
                                        <tr>
                                            <th>
                                            </th>
                                            <td>
                                                <div class="flex items-center space-x-3">
                                                    <div>
                                                        <div class="font-bold">${user.name}</div>
                                                        <div class="text-sm opacity-50">${roles[user.idNivelUsuario]}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                ${user.email}
                                            </td>
                                            <td>
                                                ${userActive}
                                            </td>
                                            <td class="flex gap-2 mt-2">
                                                <div>
                                                    <button onclick="user_id = ${user.id}; user_active.value = '${userActive}'; user_role.value = '${roles[user.idNivelUsuario]}'; user_name.value = '${user.name}'; user_email.value = '${user.email}'; user_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                                </div>
                                                <div>
                                                    <button onclick="deleteUserId = ${user.id}; user_delete.showModal()" class="btn btn-ghost btn-xs">desativar</button>
                                                </div>
                                            </td>
                                        </tr>`
                                }).join('')
                            })
                    });

                }
            </script>
</body>

</html>