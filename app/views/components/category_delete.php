<dialog id="category_delete" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Deseja mesmo deletar essa categoria?</h3>
        <div class="modal-action">
            <form method="dialog">
                <button id="category_delete_button" class="btn">Sim</button>
                <button class="btn">Não</button>
            </form>
        </div>
    </div>
</dialog>

<script>
    var deleteCategoryId

    category_delete_button.addEventListener('click', function() {
        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/category/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: deleteCategoryId
            })
        })
        new Promise((resolve) => resolve(true))
            .then(() => {
                // window.location.reload()
            })
    })
</script>