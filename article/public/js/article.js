$(function() {
    /************************Buttons de like/dislike******************************/
    $('#like-btn').click(function(e) {
        e.preventDefault();
        this.classList.toggle('click-btn');
        $('#dislike-btn').toggle();
    });
    $('#dislike-btn').click(function(e) {
        e.preventDefault();
        this.classList.toggle('click-btn');
        $('#like-btn').toggle();
    });
})