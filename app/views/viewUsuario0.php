<?php
// Supondo que você tenha um autoloader e namespaces configurados
use models\User;

function showUserTable() {
    $usuario = new Usuario();
    $rows = $usuario->listAll();
    echo "<table class='table table-striped'>";
    foreach ($rows as $row) {
        echo "<form class='frmLine' id='frmLine" . $row['idUsuario'] . "'>";
        echo "<tr>
                <td><input type='text' class='form-control' name='idUsuario' value='" . $row['idUsuario'] . "' readonly></td>
                <td><input type='text' class='form-control' name='nome' value='" . $row['nome'] . "'></td>
                <td><input type='email' class='form-control' name='email' value='" . $row['email'] . "'></td>
                <td><input type='text' class='form-control' name='telefone' value='" . $row['telefone'] . "'></td>
                <td><input type='text' class='form-control' name='endereco' value='" . $row['endereco'] . "'></td>
                <input type='hidden' name='action' value=''>
                <td><button type='button' class='btn btn-danger btnDelete'>&#128465;</button></td>
                <td><button type='button' class='btn btn-primary btnSave'>&#9998;</button></td>
            </tr>";
        echo "</form>";
    }
    echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários - Gerenciamento</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div id="tableUsuarios">
    <?php showUserTable(); ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(".btnSave").click(function(event) {
        var form = $(this).closest('form');
        form.find("input[name='action']").val('update');
        var dados = form.serialize();

        console.log("Salvar: ", form.attr('id'), dados);

        $.ajax({
            type: "POST",
            url: "ctrlUsuarios", // não esqueça de incluir o conoler no routes.json
            data: dados,
            dataType: "json",
            success: function(response) {
                if (response.saved) {
                    alert("Dado atualizado com sucesso!");
                } else {
                    alert("Não foi possível atualizar o dado.");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Erro ao atualizar: ", textStatus, errorThrown);
                alert("Erro ao atualizar!");
            }
        });
    });

    $(".btnDelete").click(function(event) {
        if (!confirm("Tem certeza que deseja excluir este usuário?")) return;

        var form = $(this).closest('form');
        form.find("input[name='action']").val('delete');
        var dados = form.serialize();

        console.log("Excluir: ", form.attr('id'), dados);

        $.ajax({
            type: "POST",
            url: "ctrlUsuarios", // não esqueça de incluir o conoler no routes.json
            data: dados,
            dataType: "json",
            success: function(response) {
                if (response.deleted) {
                    alert("Usuário excluído com sucesso!");
                    form.closest('tr').remove(); 
                } else {
                    alert("Não foi possível excluir o usuário.");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Erro ao excluir: ", textStatus, errorThrown);
                alert("Erro ao excluir!");
            }
        });
    });
});
</script>

</body>
</html>
