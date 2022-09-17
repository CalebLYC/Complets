$(function() {
    /*****************************Ajout de photo*************************/
    $('#post-image-link').click(function(e) {
        e.preventDefault();
        $('#choose-image').click();
    });
    $('#choose-image').change(function(e) {
        let file = this.files[0];

        //Aggrandir le container de l'image
        $('.post-img').css({
            'height': 600,
            position: 'relative'
        });
        if (screen.width <= 1280) { //Responsive
            $('.post-img').css({
                'height': 300,
                position: 'relative'
            });
        }


        showFile(file); //Traiter l'affichage fde l'image

        //Cacher le lien de chargement et afficher le lien de changement de l'image
        $('#post-image-link').html('<a href="#">Changer l\'image</a>');
    });

    /************************Poster le formulaire en ajax********************************/
    /*$('#post-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../http/post.ajax.php",
            data: {
                title: ,
                category ,

            },
            dataType: "json",
            success: function(response) {
                console.log(response);
            }
        });
    });*/
})

//Fonction de traitement et d'affichage de l'image
function showFile(file) {
    let fileType = file.type;

    let typeAutorized = ['image/jpg', 'image/jpeg', 'image/png', 'image/svg'];

    if (typeAutorized.includes(fileType)) {
        let fileReader = new FileReader();
        fileReader.readAsDataURL(file);

        fileReader.onload = () => {
            let fileUrl = fileReader.result;
            let imgTag = '<img src="' + fileUrl + '" alt="image"/>';

            let fileContainer = document.createElement('div');
            fileContainer.className = 'fileContainer';
            fileContainer.innerHTML = imgTag;
            $('.imageContainer').html(fileContainer);
        }
    }
}