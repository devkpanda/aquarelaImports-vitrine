<dialog id="ad_delete" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Deseja mesmo deletar esse anúncio?</h3>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Sim</button>
                <button class="btn">Não</button>
            </form>
        </div>
    </div>
</dialog>

<script>
    var adDeleteId

    ad_delete_button.addEventListener('click', function() {
        fetch('http://127.0.0.1/advertisement/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: adDeleteId
            })
        })
        new Promise((resolve) => resolve(true))
            .then(() => {
                window.location.reload()
            })
    })
</script>