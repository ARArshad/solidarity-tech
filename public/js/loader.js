
    function run_waitMe() {
        $('body').waitMe({
            effect: 'win8_linear',
            text: 'Please wait...',
            bg: 'rgba(255,255,255,0.7)',
            color: '#000000',
            maxSize: '',
            waitTime: -1,
            source: '',
            textPos: 'vertical',
            fontSize: '',
            onClose: function () {}
        });
    }

function hide_waitMe() {
    $('body').waitMe('hide');
}
