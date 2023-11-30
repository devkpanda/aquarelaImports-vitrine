<dialog id="category_update" class="modal">
    <div class="modal-box w-11/12">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="w-12/12">
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Editar</h1>
            <hr class="mt-4 w-full">
            <form id="category_update_form" action="" class="grid grid-cols-2 gap-4 ">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Nome</label>
                    <input id="category_update_name" type="text" placeholder="Digite o nome.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Categoria Pai</label>
                    <input id="category_update_parent" type="text" placeholder="Digite a categoria pai.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>

                <div class="col-span-2 flex items-center mt-4">
                    <button id="category_update_submit" type="submit" class="ml-auto btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Editar categoria</button>
                </div>
            </form>
        </div>
    </div>
</dialog>

<script>
    var editCategoryModal

    category_update_form.addEventListener('submit', () => {
        category_update_parent.disabled = true
        category_update_name.disabled = true
        category_update_submit.disabled = true

        const name = category_update_name.value
        const parent = category_update_parent.value

        const id = JSON.parse(atob(editCategoryModal)).id

        fetch("https://aquarelaimports.hostdeprojetosdoifsp.gru.br/category/update", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id,
                    name,
                    parent
                })
            })
            .then(() => {
                reset()
                fetchAndDisplayCategories()

                category_update.close()
            })
            .finally(() => {
                category_update_parent.disabled = false
                category_update_name.disabled = false
                category_update_submit.disabled = false
            })
    })
</script>