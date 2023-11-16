<div class="hidden w-full mt-10 px-8" id="category_search">
    <div class="max-w-7xl mx-auto shadow-xl gap-10 bg-white rounded-[10px] p-6">
        <div class="flex flex-col overflow-auto">
            <div class="my-4 ">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Categoria Pai</th>
                        </tr>
                    </thead>
                    <tbody id="category_listing"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function editCategory(id) {
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

    function deleteCategory(id) {
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

    fetch('http://127.0.0.1/category/listall')
        .then(response => response.json())
        .then((categories) => {
            category_listing.innerHTML = categories.map(category => `
            <tr class="hover">
                <th>${category.id}</th>
                <td>${category.description}</td>
                <td>${category.parent_id}</td>
                <td class="flex">
                    <div>
                        <button onclick="editCategoryModal.id = ${category.id}; editCategoryModal.description = "${category.description}"; editCategoryModal.parent_id = ${category.parent_id}; category_update.showModal()" class="btn btn-ghost btn-xs">editar</button>
                    </div>
                    <div>
                        <button onclick="deleteCategoryId = ${category.id}; category_delete.showModal()" class="btn btn-ghost btn-xs">excluir</button>
                    </div>
                </td>
            </tr>
            `).join('')
        })
</script>