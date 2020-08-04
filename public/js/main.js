let flashMsgId = document.getElementById('flash-msg');
let closeId = document.querySelector('.close');

closeId.addEventListener('click', function () {
    flashMsgId.animate([{
            transform: 'translateX(5px)'
        },
        {
            transform: 'translateX(-400px)'
        }
    ], {
        duration: 800,
        fill: "forwards"

    });
});