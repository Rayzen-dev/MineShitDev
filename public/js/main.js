$(function () {
    $('body').niceScroll({
        cursorcolor:		"#2ecc71",
        cursorborder: 		"0px solid #000",
        background: 		'#ddd',
        zindex: 1,
    });

    $('.card-content').niceScroll({
        cursorcolor:		"#2ecc71",
        cursorborder: 		"0px solid #000",
        background: 		'#ddd',
    });
    
    function showAuthForm() {
        alert('all');
    }
});

function toggleAuthForm(state) {
    if ('show' === state) {
        document.querySelector('.app').classList.add('blurred');
        document.querySelector('.auth-overlay').style.display = 'block';
    } else {
        document.querySelector('.app').classList.remove('blurred');
        document.querySelector('.auth-overlay').style.display = 'none';
    }
}
