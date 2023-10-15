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
                  <a href="#" class="hover:gb-gray-200  block px-3 py-2 rounded-md text-xs font-sm">add</a>
                  <a href="#" class="hover:gb-gray-200 block px-3 py-2 rounded-md text-xs font-sm">update</a>
                </div>
              </div>
              <li><a id="btn_pd">Pedidos</a></li>
              <div id="menu_pd" class="hidden">
                <div class="px-2 pt-2 pd-3 sm:px-3">
                  <a href="#" class="hover:gb-gray-200  block px-3 py-2 rounded-md text-xs font-sm">gerenciar</a>
                  <a href="#" class="hover:gb-gray-200 block px-3 py-2 rounded-md text-xs font-sm">pesquisar</a>
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

        <div class="grid gp-10 bg-gray-100 rounded-[10px] p-[3rem] h-50 m-10 w-6/12">
          <form action="">
              <div class="m-4 flex flex-row justify-center rounded-[8px] bg-white p-5 shadow-lg shadow-greyIsh-700">
                <div class="">
                  <div class="form-control flex flex-row">
                  <input type="text" placeholder="Pesquise o anúncio" class=" input input-bordered mt-4" />
                  <button class="btn btn-square mt-4 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                  </button> 
                </div>
              </div>
              <div class="">
                  <div class="form-control flex flex-row">
                  <div class="form-control">
                    <div class="input-group m-4">
                      <select class="select select-bordered">
                        <option disabled selected>Pick category</option>
                        <option>T-shirts</option>
                        <option>Mugs</option>
                      </select>
                      <button class="btn">Go</button>
                    </div>
              </div>
                </div>
              </div>
              </div>
          </form>
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

<script src="/Jquery/jquery-3.5.1.min.js"></script>


</html>