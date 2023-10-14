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
        <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost btn-circle" id="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
      </label>
   
    </div>
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">Administrador</a>
        </div>
        <div class="flex-none">

        <div class="dropdown dropdown-end">
      <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
      </button>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
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

    <div id="menu" class="hidden rounded-md">
    <div class="px-2 pt-2 pd-3 sm:px-3 w-60 bg-orange-500">
        <a href="#" class="block px-3 py-2 rounded-md text-base
        font-medium">Anúncios</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base
        font-medium">Pedidos</a>
    </div>
    </div>
    </div>
    </div>
</body>
<script>
    const btn = document.getElementById("button")
    const menu = document.getElementById("menu")

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden")
    })
</script>

<script src="/Jquery/jquery-3.5.1.min.js"></script>


</html>