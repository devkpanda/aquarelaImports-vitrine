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
  <div class="navbar bg-orange-500 h-28">
  <div class="drawer">
          <input id="my-drawer" type="checkbox" class="drawer-toggle" />
          <div class="drawer-content">
          <label for="my-drawer" tabindex="0" class="btn btn-ghost btn-circle text-white" id="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
      </label>
          </div> 
          <div class="drawer-side">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
              <!-- Sidebar content here -->
              <li><a id="btn_ad">Anúncios</a></li>
              <div id="menu_ad" class="hidden">
                <div class="px-2 pt-2 pd-3 sm:px-3">
                  <a href="#" class="hover:gb-gray-200  block px-3 py-2 rounded-md text-xs font-sm">Inserir</a>
                  <a href="#" class="hover:gb-gray-200 block px-3 py-2 rounded-md text-xs font-sm">Atualizar</a>
                  <a href="#" class="hover:gb-gray-200  block px-3 py-2 rounded-md text-xs font-sm">Deletar</a>
                  <a href="#" class="hover:gb-gray-200 block px-3 py-2 rounded-md text-xs font-sm">Listar</a>
                </div>
              </div>
              <li><a id="btn_pd">Pedidos</a></li>
              <div id="menu_pd" class="hidden">
                <div class="px-2 pt-2 pd-3 sm:px-3">
                  <a href="#" class="hover:gb-gray-200  block px-3 py-2 rounded-md text-xs font-sm">Gerenciar</a>
                  <a href="#" class="hover:gb-gray-200 block px-3 py-2 rounded-md text-xs font-sm">Pesquisar</a>
                </div>
              </div>
            </ul>
          </div>
        </div>
            
        <div class="flex-1">
       <!-- <img class="w-20" src="/app/views/images/logo2.png"> !-->
          <a class="btn btn-ghost normal-case text-xl text-white">Administrador</a>
        </div>
        <div class="flex-none">

          <div class="dropdown dropdown-end text-white">
            <button class="btn btn-square btn-ghost">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
            </button>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 ">
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>
        </div>

        <div class="grid gp-10 bg-white rounded-[10px] p-[3rem] h-50 m-10 w-6/12">
          <form action="">
              <div class="m-4 flex flex-row justify-center rounded-[8px] bg-white p-5 shadow-lg shadow-greyIsh-700">
                <div class="">
                  <div class="form-control flex flex-row">

                  <input type="text" id="search" placeholder="Pesquise o anúncio" class=" input input-bordered mt-4" />

                  <button class="btn btn-square mt-4 mr-4" id="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" id="submit" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                  </button> 

                </div>
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
        </div>

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
        </div>

</body>

<script>

    const menu_ad = document.getElementById("menu_ad");
    const btn_ad  = document.getElementById("btn_ad");
    const menu_pd = document.getElementById("menu_pd");
    const btn_pd  = document.getElementById("btn_pd");

    btn_ad.addEventListener("click", () => {
        menu_ad.classList.toggle("hidden")
    })

    btn_pd.addEventListener("click", () => {
        menu_pd.classList.toggle("hidden")
    })
      
  


</script>


<script src="/../../public/assets/js/script.js"></script>

<script src="/Jquery/jquery-3.5.1.min.js"></script>


</html>