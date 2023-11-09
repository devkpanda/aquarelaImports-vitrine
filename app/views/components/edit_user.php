<dialog id="user_update" class="modal">
    <div class="modal-box w-11/12">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="w-12/12">
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Editar</h1>
            <hr class="mt-4 w-full" />
            <form id="edit_user" action="POST" class="grid grid-cols-2 gap-4">
                <!-- <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Id</label>
                    <input type="text" placeholder="Id" class="input input-bordered w-full max-w-xs" disabled />
                </div> -->
                <!-- <select class="select select-bordered join-item mt-11">
                    </select> -->
                <div class="mt-3">
                    <label for="email" class="mb-2 block text-base">Nome</label>
                    <input id="user_name" type="text" placeholder="Digite o nome.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="user_role" class="mb-2 block text-base">Nível Usuário</label>
                    <select id="user_role" class="select select-bordered join-item w-full">
                        <option>Administrador</option>
                        <option>Funcionário</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="email" class="mb-2 block text-base">E-mail</label>
                    <input id="user_email" type="email" placeholder="Digite o e-mail.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="user_active" class="mb-2 block text-base">Ativo</label>
                    <select id="user_active" class="select select-bordered join-item w-full">
                        <option>Sim</option>
                        <option>Não</option>
                    </select>
                </div>
                <div class="mt-3 col-span-2 flex items-center justify-end">
                    <button type="submit" class="btn btn-default border-orange-500 bg-orange-500 font-black text-white hover:bg-black">Alterar Usuário</button>
                </div>
            </form>
        </div>
    </div>
</dialog>

<script>
    edit_user.addEventListener('submit', function(e) {
        e.preventDefault()

        const id = 1

        const idNivelUsuario = user_role.value === 'Administrador' ? 1 : 2

        const name = user_name.value
        const email = user_email.value
        const active = user_active.value === 0 ? 0 : 1

        fetch('http://127.0.0.1/user/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id,
                    name,
                    email,
                    idNivelUsuario,
                    active
                })
            })
            .then(() => {
                window.location.reload()
            })
    })
</script>