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


<!--
        <script setup>
            import ad from '/icons/icons-ad.png'
            import insert from '/icons/insert.png'
            import update from '/icons/update.png'
                const sidebar = [
                    [
                        { name: "Advertisement", icon: ad },
                        { name: "Insert", icon: insert },
                        { name: "Update", icon: update }
                    ]
                ];

        </script> -->

        <div class="w-full min-h-screen font-sans text-gray-900 bg-gray-50 ml-4 flex">
          <aside class="py-6 px-18 w-64 border-r border-gray-200">
            <div class="flex justify-center items-center">
            <img src="/app/views/images/logo2.png" alt="" class="w-28">
            </div>
              
                <ul v-for="group in sidebar" class="flex flex-col gap-y-6 pt-20 ">
                    <li v-for="item in group">
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                            <img src="/app/views/icons/icon-ad.png" alt="" class="w-8 mr-4">
                        <!--
                            $ npm install -D vite-svg-loader
                            <Component :is="item.icon" class="w-6 h-6 fill-current" />
                           <span> {{ item.name }} </span>-->
                            Anúncios

                          <!--  <span>
                                class="absolute w-1.5 h-8 bg-black rounded-r-full left-0 scale y-0 
                                -translate-x-full group-hover:scale-y-100 group-hover:translate-x-0
                                transition-transform ease-out"
                            </span> -->
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                        <img src="/app/views/icons/pedido.png" alt="" class="w-8 mr-4">
                            Pedidos
                        </a>
                    </li>
                </ul>
                <ul class="flex items-center px-4 border-y border-gray-200">
                    <li>
                        <a href="#" class="flex gap-x4 items-start py-2 text-gray-500 hover:text-black">
                            Logout
                        </a>
                    </li>
            </aside>

            <main class="flex-l w-full ">
                <div class="flex">
                <div class="flex items-center justify-between py-7 px-10">
                    <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Administrador</h1>
                </div>
                </div>

                <div class="flex flex-col">
                <ul class="flex gap-x-24 items-center px-4 border-y border-gray-200">
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500">
                            Publicados
                        </button>
                    </li>
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500">
                            Arquivados
                        </button>
                    </li>
                    <li>
                        <button class="flex gap-x-2 items-center py-5 px-6 text-gray-500">
                            Rascunhos
                        </button>
                    </li>
                </ul>
                </div>

                <div class="grid gp-10 bg-white rounded-[10px] p-[3rem] h-50 m-10 w-6/12">
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
                        </div>
                </div>
                    </form>
            
            </main>


        </div>

</body>
</html>


<!-- forms so p guardar
     <div class="container mx-auto">
          <div class="w-6/12 bg-white rounded-md mx-auto shadow-lg overflow-hidden">
              <div class="py-16 px-12">
                <img class="w-20" src="/app/views/images/logo2.png">
              <div class="flex justify-between m-4">
                <H2 class="text-3xl mb-4 text-black text-center m-2 font-serif">Inserir</H2>
          </div>
                
                  <form action="#">
                      <div class="grid grid-cols-2 gap-5">
                        <div class="">
                          <h2 class="m-2">Código:</h2>
                          <input type="text" placeholder="Código" class="border-gray-400 py-1 px-2 input input-bordered max-w-xs ">
                        </div>
                        <div>
                          <h2 class="m-2">Nome:</h2>
                          <input type="text" placeholder="Nome" class="border-gray-400 py-1 px-2 input input-bordered max-w-xs">
                        </div>
                      </div>
                      <div class="grid grid-cols-2 gap-5 mt-5">
                        <div>
                          <h2 class="m-2">Descrição:</h2>
                          <textarea class="textarea textarea-bordered mr-2 max-w-xs" placeholder="Descrição"></textarea>
                        </div>
                        <div>
                          <h2 class="m-2">Preço:</h2>
                          <input type="text" placeholder="Preço" class="border-gray-400 py-1 px-2 input input-bordered max-w-xs ">
                        </div>
                      </div>
                      <div class="mt-5 grid grid-cols-2 gap-5">
                        <div>
                          <select class="select select-bordered max-w-xs">
                            <option disabled selected>Categoria</option>
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                        <div>
                          <h2 class="m-2">Medida:</h2>
                          <input type="text" placeholder="Medida" class="border-gray-400 py-1 px-2 input input-bordered max-w-xs">
                        </div>
                      </div>
                      <div class="grid grid-cols-2 gap-5 mt-5">
                        <div>
                          <h2 class="m-2">Tamanho:</h2>
                          <input type="text" placeholder="Tamanho" class="border-gray-400 py-1 px-2 input input-bordered max-w-xs">
                        </div>
                        <div>
                          <h2 class="m-2">Video(URL):</h2>
                          <input type="text" placeholder="video url" class="border-gray-400 py-1 px-2 input input-bordered max-w-xs">
                        </div>
                      </div>
                  </form>
                      <div>
                        <button class="btn m-5 inline-block align-middle">Inserir</button>
                      </div>
              
            </div>
            </div>
        </div> -->