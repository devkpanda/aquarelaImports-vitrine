<dialog id="ad_delete" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Deseja mesmo deletar esse anúncio?</h3>
        <div class="modal-action">
            <form method="dialog">
                <button id="ad_delete_button" class="btn">Sim</button>
                <button class="btn">Não</button>
            </form>
        </div>
    </div>
</dialog>

<script>
    var adDeleteId

    ad_delete_button.addEventListener('click', function() {
        fetch('https:/aquarelaimports.hostdeprojetosdoifsp.gru.br/advertisement/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: adDeleteId
                })
            })
            .then(() => {
                window.location.reload()
            })
    })
</script>