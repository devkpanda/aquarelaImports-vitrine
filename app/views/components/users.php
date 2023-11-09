<div class="w-full hidden mt-5 px-12 md:px-20" id="usr_tbl">
    <div class="mx-auto shadow-xl bg-white rounded-[10px] py-4 overflow-x-auto">
        <table class="table w-full">
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
            <tbody id="listusers"></tbody>
        </table>
    </div>
</div>

<script>
    fetch("http://127.0.0.1/user/listall", {
            method: "GET",
            headers: {
                'Origin': 'http://127.0.0.1',
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

                return `<tr>
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
</script>