<dialog id="ad_update" class="modal">
    <div class="modal-box w-11/12">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="w-12/12">
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Editar</h1>
            <hr class="mt-4 w-full">
            <form id="ad_update_form" action="" class="grid grid-cols-2 gap-4 ">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">SKU</label>
                    <input id="ad_update_sku" type="text" placeholder="Digite o SKU.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Nome</label>
                    <input id="ad_update_name" type="text" placeholder="Digite o nome.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Descrição</label>
                    <input id="ad_update_description" type="text" placeholder="Digite a descrição.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Preço</label>
                    <input id="ad_update_price" type="text" placeholder="Digite o preço.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">ID da Categoria</label>
                    <input id="ad_update_id" type="text" placeholder="Digite o Id.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <!-- Litros (L), Centimetro cubico (cm³), Metro cubico (m³) -->
                    <label for="email" class="block text-base mb-2">Medida</label>
                    <select id="ad_update_measurement" type="text" placeholder="Digite a medida.." class="w-full select select-bordered bg-gray-100">
                        <option value="L">Litros (L)</option>
                        <option value="cm²">Centrimetro cúbico (cm²)</option>
                        <option value="m²">Metro cúbico (m²)</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Tamanho</label>
                    <input id="ad_update_size" type="text" placeholder="Digite o tamanho.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">URL do vídeo</label>
                    <input id="ad_update_url" type="text" placeholder="Digite a URL do vídeo.." class="w-full input input-bordered bg-gray-100" />
                </div>

                <div class="col-span-2 flex items-center mt-10">
                    <button type="submit" id="ad_update_submit_button" class="ml-auto btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Editar anúncio</button>
                </div>
            </form>
        </div>
    </div>
</dialog>

<script>
    ad_update_form.addEventListener('submit', () => {
        const advertisement = JSON.parse(atob(editAdvertisementModal))

        advertisement.disabled = true
        ad_update_sku.disabled = true
        ad_update_name.disabled = true
        ad_update_description.disabled = true
        ad_update_price.disabled = true
        ad_update_id.disabled = true
        ad_update_measurement.disabled = true
        ad_update_size.disabled = true
        ad_update_url.disabled = true
        ad_update_submit_button.disabled = true

        const id = advertisement.id
        const sku = ad_update_sku.value
        const name = ad_update_name.value
        const description = ad_update_description.value
        const price = ad_update_price.value
        const category_id = ad_update_id.value
        const measurement = ad_update_measurement.value
        const size = ad_update_size.value
        const url = ad_update_url.value

        fetch("https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/update", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id,
                    cod: sku,
                    name,
                    description,
                    price,
                    category_id,
                    measurement,
                    size,
                    url,
                })
            })
            .then(() => {
                fetchAndDisplayAds(response)
                ad_update.close()
            })
            .finally(() => {
                advertisement.disabled = false
                ad_update_sku.disabled = false
                ad_update_name.disabled = false
                ad_update_description.disabled = false
                ad_update_price.disabled = false
                ad_update_id.disabled = false
                ad_update_measurement.disabled = false
                ad_update_size.disabled = false
                ad_update_url.disabled = false
                ad_update_submit_button.disabled = false
            })
    })
</script>