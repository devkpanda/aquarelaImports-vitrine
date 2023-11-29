<div class="hidden w-full mt-10 px-8" id="ad_search">
    <div class="max-w-7xl mx-auto shadow-xl gap-10 bg-white rounded-[10px] p-6">
        <form id="ad_search_form" action="GET">
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
                            <th>Video</th>
                        </tr>
                    </thead>
                    <tbody id="ads_listing"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function editAd(id) {
        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id
                })
            })
            .then((response) => response.json())
            .then((response) => fetchAndDisplayAds())
        // .then((response) => window.location.reload())
    }

    function deleteAd(id) {
        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id
                })
            })
            .then((response) => response.json())
            .then((response) => fetchAndDisplayAds())
        // .then((response) => window.location.reload())
    }

    var editAdvertisementModal

    function loadAdvertisement() {
        const advertisement = JSON.parse(atob(editAdvertisementModal))

        ad_update_sku.value = advertisement.cod
        ad_update_name.value = advertisement.name
        ad_update_description.value = advertisement.description
        ad_update_price.value = advertisement.price
        ad_update_id.value = advertisement.category_id
        ad_update_measurement.value = advertisement.measurement
        ad_update_size.value = advertisement.size
        ad_update_url.value = advertisement.videoUrl
    }

    function displayAds(ads) {
        const formatter = new Intl.NumberFormat('pt-BR', {
            style: "currency",
            currency: "BRL"
        })

        ads_listing.innerHTML = ads.map(ad => `
            <tr class="hover">
                <th>${ad.id}</th>
                <td>${ad.name}</td>
                <td>${ad.description}</td>
                <td>${formatter.format(ad.price)}</td>
                <td>${ad.size}</td>
                <td><a class="truncate" href="${ad.video}">${ad.video}</a></td>
                <td class="flex">
                    <div>
                        <button onclick="editAdvertisementModal = '${btoa(JSON.stringify(ad))}'; loadAdvertisement(); ad_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                    </div>
                    <div>
                        <button onclick="adDeleteId = ${ad.id}; ad_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                    </div>
                </td>
            </tr> 
        `)
            .join("")
    }

    function fetchAndDisplayAds() {
        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/search', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    search: name
                })
            })
            .then((response) => response.json())
            .then((response) => displayAds(response))
    }

    ad_search_form.addEventListener('submit', (e) => {
        e.preventDefault()

        const name = ad_search_name.value

        fetchAndDisplayAds()
    })
</script>