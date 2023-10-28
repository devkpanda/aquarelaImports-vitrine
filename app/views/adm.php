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
                        <a href="#" id="home_btn" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" id="ad_btn" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            Anúncios
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                            Pedidos
                        </a>
                    </li>
                </ul>

                <div class=" items-end px-4 mt-96">
                  <ul class="border-y border-gray-200 w-full">
                    <li class="">
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#c0bfbc}</style><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            Logout
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-6 ml-2 mt-1" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#c0bfbc}</style><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                            Settings
                        </a>
                    </li>
                </div>
            </div>
          </aside>

            <main class="flex-l w-full ">
                <div class="flex flex-col">
                  <div class="flex items-center justify-between py-7 px-10">
                      <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Administrador</h1>
                      <p class="text-sm font-medium text-gray-500">Administre sua página aqui.</p>
                  </div>
                </div>
                <div class="hidden flex flex-col" id="ad_ul">
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
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500">
                            Alterar
                        </button>
                    </li>
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500">
                            Deletar
                        </button>
                    </li>
                  </ul>
                </div>
                

                <div class=" hidden mt-4 flex justify-center items-center" id="ad_search">
                  <div class="grid gp-10 bg-white shadow-lg rounded-[10px] p-[3rem] h-50 m-10 w-6/12 flex justify-center" >
                    <form action="">
                        <div class="flex justify-center">
                                <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Pesquise o anúncio</h1>
                        </div>
                            <div class="m-4 flex flex-row justify-center rounded-[8px] bg-white p-5 shadow-lg shadow-greyIsh-700">
                                    <div class="form-control flex flex-row">
                                        <input type="text" id="search" placeholder="Pesquise o anúncio" class=" input input-bordered mt-4" />
                                        <button class="btn btn-square mt-4 mr-4" id="submit">
                                          <svg xmlns="http://www.w3.org/2000/svg" id="submit" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                        </button> 
                                    </div>
                            <div class="">
                                <div class="form-control flex flex-row">
                                    <div class="form-control">
                                        <div class="input-group m-4">
                                          <select class="select select-bordered">
                                              <option disabled selected>Categoria</option>
                                              <option>1</option>
                                              <option>2</option>
                                          </select>
                                        <button class="btn">Go</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                  </div>
                </div>
              </main>

<!-- script para os formulários e a tela de search só aparecerem conforme solicitado. Deixar mais como um rascunho já que ainda tem muitos erros -->
        <script>
          const ad_btn      = document.getElementById("ad_btn");
          const ad_search   = document.getElementById("ad_search");
          const ad_ul       = document.getElementById("ad_ul");
          const search_btn  = document.getElementById("search_btn");
          const home_btn    = document.getElementById("home_btn");

          ad_btn.addEventListener("click", () => {
            ad_ul.classList.toggle("hidden");
          });

          search_btn.addEventListener("click", () => {
            ad_search.classList.toggle("hidden");
          });

         /* add_btn.addEventListener("click", () => {
            ad_add.classList.toggle("hidden");
          }); */


        </script>
</body>
</html>