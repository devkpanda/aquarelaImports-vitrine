<dialog id="ad_update" class="modal">
    <div class="modal-box w-11/12">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="w-12/12">
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Editar</h1>
            <hr class="mt-4 w-full">
            <form action="" class="grid grid-cols-2 gap-4 ">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Id</label>
                    <input id="ad_update_id" type="text" placeholder="Id" class="input input-bordered w-full max-w-xs" disabled />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Nome</label>
                    <input id="ad_update_name" type="text" placeholder="Digite o nome.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Descrição</label>
                    <input id="ad_update_description" type="text" placeholder="Digite a descrição.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Preço</label>
                    <input id="ad_update_price" type="text" placeholder="Digite o preço.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base">Categoria</label>
                    <select id="ad_update_category" class="select select-bordered join-item w-full mt-2">
                        <option disabled selected>Categoria</option>
                        <option>S</option>
                        <option>N</option>
                    </select>
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Peso</label>
                    <input id="ad_update_weight" type="text" placeholder="Digite o peso.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Tamanho</label>
                    <input id="ad_update_size" type="text" placeholder="Digite o tamanho.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">URL do Vídeo</label>
                    <input id="ad_update_url" type="text" placeholder="Digite a URL do vídeo.." class="input input-bordered w-full max-w-xs bg-gray-100" />
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Foto</label>
                    <input id="ad_update_photos" type="file" class="file-input file-input-bordered file-input-bg-orange-500 w-full max-w-xs bg-gray-100" />
                </div>

                <div class="flex justify-center items-center mt-10">
                    <button class="btn btn-default bg-orange-500 hover:bg-black font-black border-orange-500 text-white">Editar anúncio</button>
                </div>
            </form>
        </div>
    </div>
</dialog>