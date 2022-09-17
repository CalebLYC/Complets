$(document).ready(function() {
    /*******************Menu de navigation**************************/
    $('.hamburger').click(function(e) {
        e.preventDefault();
        $('.menu').toggleClass('show');
        $('.menu').toggleClass('hide');
    });
    /**********************************Mode clair/mode nuit**********************/
    $('#nightModeButton').click(function(e) {
        e.preventDefault();
        if (this.textContent == 'Mode nuit') {
            this.textContent = 'Mode clair';
            $('body').css('backgroundColor', 'rgba(0, 0, 0, .7)');
            $('div').css('color', '#FFF');
            $('.article-title').css('color', 'rgba(111, 207, 178, .6)');
            $('hr').css('color', 'rgba(0, 0, 0, .9)');
            console.log(e);
        } else {
            this.textContent = 'Mode nuit';
            $('body').css('backgroundColor', '#FFF');
            $('div').css('color', 'rgba(0, 0, 0, .7)');
            $('.article-title').css('color', 'rgba(111, 207, 178, .6)');
            $('hr').css('color', 'rgba(0, 0, 0, .9)');
            console.log(e);
        }
    });
})