<div class="w-full hidden mt-5 px-12 md:px-20" id="category_add">
    <div class="mx-auto max-w-4xl p-3">
        <div class="flex justify-center">
            <div class="avatar">
                <div class="w-24 rounded-full mt-4 -my-12 lg:shadow">
                    <img src="/app/views/images/list-icon.jpg" class="" />
                </div>
            </div>
        </div>
        <div class="p-8 shadow-lg bg-white rounded-lg">
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Inserir</h1>
            <hr class="mt-4 w-full">
            <form id="ad_category_form" action="POST" class="w-full grid md:grid-cols-2 md:gap-x-8">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Nome</label>
                    <input id="category_name" type="text" placeholder="Digite o nome.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Categoria Pai</label>
                    <input id="category_parent" type="text" placeholder="Digite o nome da categoria.." class="w-full input input-bordered bg-gray-100" />
                </div>

                <div class="md:col-span-2 flex justify-center items-center mt-6">
                    <button id="category_add_submit_button" type="submit" class="ml-auto btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Adicionar categoria</button>
                </div>
            </form>

            <div class="hidden">
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>A categoria foi inserida!</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    ad_category_form.addEventListener('submit', async function(e) {
        e.preventDefault()

        category_name.disabled = true
        category_parent.disabled = true
        category_add_submit_button.disabled = true

        const description = category_name.value
        const parentId = category_parent.value

        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/category/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    description: description,
                    parent_id: parentId
                })
            })
            .then((response) => response.json())
            .then((response) => {
                if (response.ok) {
                    // window.location.reload()
                }
            }).finally(() => {
                category_name.disabled = false
                category_parent.disabled = false
                category_add_submit_button.disabled = false
            })
    })
</script>