<div class="w-full hidden mt-5 px-12 md:px-20" id="ad_add">
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
            <form id="ad_form" action="POST" class="w-full grid md:grid-cols-2 md:gap-x-8">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">SKU</label>
                    <input id="ad_sku" type="text" placeholder="Digite o SKU.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Nome</label>
                    <input id="ad_name" type="text" placeholder="Digite o nome.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Descrição</label>
                    <input id="ad_description" type="text" placeholder="Digite a descrição.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Preço</label>
                    <input id="ad_price" type="text" placeholder="Digite o preço.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Id da Categoria</label>
                    <input id="ad_id" type="text" placeholder="Digite o Id.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Peso</label>
                    <input id="ad_weight" type="text" placeholder="Digite o peso.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Medida</label>
                    <input id="ad_measurement" type="text" placeholder="Digite a medida.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Tamanho</label>
                    <input id="ad_size" type="text" placeholder="Digite o tamanho.." class="w-full input input-bordered bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">URL do vídeo</label>
                    <input id="ad_url" type="text" placeholder="Digite a URL do vídeo.." class="w-full input input-bordered bg-gray-100" />
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Fotos</label>
                    <input id="ad_photo" multiple accept="image/*" type="file" class="file-input file-input-bordered file-input-bg-orange-500 w-full bg-gray-100" />
                </div>

                <div class="mt-6">
                    <div class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Seu anúncio foi inserido!</span>
                    </div>
                </div>

                <div class="flex justify-center items-center mt-6">
                    <button type="submit" class="ml-auto btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Adicionar anúncio</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    async function convertToBase64(file) {
        return new Promise((resolve) => {
            const fileReader = new FileReader()

            fileReader.readAsDataURL(file)
            fileReader.addEventListener('load', (e) => {
                resolve(e.target.result)
            })

            fileReader.addEventListener('error', (e) => {
                reject(e.target.result)
            })
        })
    }

    let adPhotoBase64 = {}

    ad_form.addEventListener('submit', async function(e) {
        e.preventDefault()

        const sku = ad_sku.value
        const categoryId = ad_id.value
        const name = ad_name.value
        const description = ad_description.value
        const measurement = ad_measurement.value
        const price = ad_price.value
        const weight = ad_weight.value
        const size = ad_size.value
        const videoUrl = ad_url.value

        fetch('/advertisement/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    cod: sku,
                    name: name,
                    description: description,
                    price: price,
                    category_id: categoryId,
                    measurement: measurement,
                    size: size,
                    videoUrl: videoUrl,
                    base64_data: adPhotoBase64
                })
            })
            .then((response) => response.json())
            .then((response) => {
                window.location.reload()
            })
    })

    ad_photo.addEventListener('change', async function(e) {
        const files = e.target.files

        for (let index = 0; index < files.length; index++) {
            const photoBase64 = await convertToBase64(files[index])

            adPhotoBase64[index] = photoBase64
        }
    });
</script>