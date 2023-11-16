<div class="hidden w-full mt-10 px-8" id="ad_search">
    <div class="max-w-7xl mx-auto shadow-xl gap-10 bg-white rounded-[10px] p-6">
        <form action="GET">
            <div class="flex flex-col items-center justify-center gap-5 p-5">
                <h1 class="text-center text-2xl font-semibold leading-relaxed text-gray-800">Pesquise o anúncio</h1>
                <div class="join">
                    <input id="ad_search_name" class="input input-bordered join-item" placeholder="Insira o nome.." />
                    <select id="ad_search_category" class="select select-bordered join-item">
                        <option disabled selected>Categoria</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <div class="indicator">
                        <button id="ad_search_button" class="btn join-item">Pesquisar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="flex flex-col overflow-auto">
            <div class="my-4 ">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Tamanho</th>
                            <th>Peso</th>
                            <th>Video</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr class="hover">
                            <th>1</th>
                            <td>Conjunto Freio à disco</td>
                            <td>Conjunto de instalação de freio à disco para bicicletas. Contendo dois discos, duas pinças com quatro pastilhas, dois cabos com conduites</td>
                            <td>R$150</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td class="flex justify-">
                                <div>
                                    <button onclick="ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                </div>
                                <div>
                                    <button onclick="ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 2 -->
                        <tr class="hover">
                            <th>2</th>
                            <td>Coroa</td>
                            <td>Coroa convencional para bicicletas sem marcha. 44 dentes</td>
                            <td>R$150</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td class="flex justify-between">
                                <div>
                                    <button onclick="ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                </div>
                                <div>
                                    <button onclick="ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 3 -->
                        <tr class="hover">
                            <th>3</th>
                            <td>Pedivela</td>
                            <td>Pedivila convencional de alumínio, 44mm</td>
                            <td>R$150</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td class="flex justify-between">
                                <div>
                                    <button onclick="ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                                </div>
                                <div>
                                    <button onclick="ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function editAd(id) {
        fetch('http://127.0.0.1/advertisement/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id
                })
            })
            .then((response) => response.json())
            .then((response) => window.location.reload())
    }

    function deleteAd(id) {
        fetch('http://127.0.0.1/advertisement/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id
                })
            })
            .then((response) => response.json())
            .then((response) => window.location.reload())
    }

    ad_search_button.addEventListener('click', () => {
        const name = ad_search_name.value

        // todo /ad/search
        // todo /ad/edit
        // todo /ad/delete
    })
</script>