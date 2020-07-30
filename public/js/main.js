let flashMsgId = document.getElementById('flash-msg');
let closeId = document.querySelector('.close');

closeId.addEventListener('click', function () {
    flashMsgId.animate([{
            transform: 'translateY(-56px)'
        },
        {
            transform: 'translateY(-110px)'
        }
    ], {
        duration: 1000,
        fill: "forwards"
    });
});