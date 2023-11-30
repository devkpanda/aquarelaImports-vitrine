<div class="hidden w-full mt-10 px-8" id="order_search">
    <div class="max-w-7xl mx-auto shadow-xl gap-10 bg-white rounded-[10px] p-6">
        <div class="flex flex-col overflow-auto">
            <div class="my-4 ">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Id do Anuncio</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody id="order_listing"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchAndDisplayOrders() {
        return fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/order/listall')
            .then(response => response.json())
            .then((orders) => {
                order_listing.innerHTML = orders.map(order => `
                <tr class="hover">
                    <th>${order.id}</th>
                    <td>${order.advertisement_id}</td>
                    <td>${order.advertisement_name}</td>
                    <td class="flex">
                        <div>
                            <button onclick="deleteOrderId = ${order.id}; order_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                        </div>
                    </td>
                </tr>
                `).join('')
            })
    }
</script>