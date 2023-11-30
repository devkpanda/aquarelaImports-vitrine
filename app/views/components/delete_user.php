<dialog id="user_delete" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Deseja mesmo deletar esse usuário?</h3>
        <div class="modal-action">
            <form method="dialog">
                <button id="user_delete_button" class="btn">Sim</button>
                <button class="btn">Não</button>
            </form>
        </div>
    </div>
</dialog>

<script>
    user_delete_button.addEventListener('click', function() {
        fetch('https://aquarelaimports.hostdeprojetosdoifsp.gru.br/user/disable', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: deleteUserId
                })
            })
            .then(() => {
                // window.location.reload()
            })
    })
</script>