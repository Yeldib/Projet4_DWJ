let flashMsgId = document.querySelector('.flash-msg');
let closeId = document.querySelector('.close');

closeId.addEventListener('click', function () {
    flashMsgId.animate([{
            transform: 'translateX(5px)'
        },
        {
            transform: 'translateX(-500px)'
        }
    ], {
        duration: 800,
        fill: "forwards"

    });
});