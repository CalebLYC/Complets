$(document).ready(function() {
    /************************Button de suppression********************************/
    $('.article-delete').click(function(e) {
        e.preventDefault();

        if (confirm("Êtes-vous sûr de vouloir supprimer cet article? Cet action est irréversible!!!")) {
            $.ajax({
                type: "POST",
                url: "uploads/delete.ajax.php",
                data: "data",
                dataType: "dataType",
                success: function(response) {

                }
            });
        }
    });
});