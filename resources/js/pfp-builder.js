(function () {
    var canvas = document.getElementById('pfp-builder');
    var ctx = canvas.getContext('2d');

    var selects = document.getElementsByTagName('select');
    for (var i = selects.length - 1; i >= 0; --i) {
        selects[i].addEventListener('change', buildImage);
    }

    buildImage();

    function drawImageScaled(select) {
        var img = new Image();
        img.onload = function(){
            var hRatio = canvas.width  / img.width;
            var vRatio =  canvas.height / img.height;
            var ratio  = Math.min ( hRatio, vRatio );
            var centerShift_x = ( canvas.width - img.width*ratio ) / 2;
            var centerShift_y = ( canvas.height - img.height*ratio ) / 2;
            ctx.drawImage(
                img, 0,0, img.width, img.height,
                centerShift_x, centerShift_y, img.width*ratio, img.height*ratio
            );
        };

        var folder = select.getAttribute('name');
        var file = select.value;
        img.src = '/traits/' + folder + '/' + file + '.webp';
    }

    function buildImage() {
        ctx.clearRect(0,0,canvas.width, canvas.height);

        var selects = document.getElementsByTagName('select');
        for (var i = selects.length - 1; i >= 0; --i) {
            drawImageScaled(selects[i]);
        }
    }
})();
