(function () {
    var canvas = document.getElementById('pfp-builder');
    var ctx = canvas.getContext('2d');

    var selects = document.getElementsByTagName('select');
    for (var i =  0; i < selects.length; ++i) {
        selects[i].addEventListener('change', buildImage);
    }

    document.querySelector('.pfp-download').addEventListener('click', function () {
        // Download canvas image as PNG file
        var image = canvas.toDataURL();
        var aDownloadLink = document.createElement('a');
        aDownloadLink.download = 'pizza-rhino-custom-nft.png';
        aDownloadLink.href = image;
        aDownloadLink.click();
    });

    buildImage();

    function drawImageScaled(image) {
        var hRatio = canvas.width  / image.width;
        var vRatio =  canvas.height / image.height;
        var ratio  = Math.min ( hRatio, vRatio );
        var centerShift_x = ( canvas.width - image.width*ratio ) / 2;
        var centerShift_y = ( canvas.height - image.height*ratio ) / 2;
        ctx.drawImage(
            image, 0,0, image.width, image.height,
            centerShift_x, centerShift_y, image.width*ratio, image.height*ratio
        );
    }

    function buildImage() {
        ctx.clearRect(0,0,canvas.width, canvas.height);
        var imagePromises = [];

        var selects = document.getElementsByTagName('select');
        for (var i =  0; i < selects.length; ++i) {
            imagePromises.unshift(downloadImage(selects[i]));
        }

        Promise.all(imagePromises).then(function (images) {
            images.forEach(function (image) {
                drawImageScaled(image);
            });
        }, function (err) {
            alert('Error loading image frames');
        });
    }

    function downloadImage(select) {
        return new Promise((resolve, reject) => {
            var image = new Image();

            image.onload = function(){
                resolve(image);
            };

            image.onerror = function (err) {
                reject(err);
            }

            var folder = select.getAttribute('name');
            var file = select.value;
            image.src = '/traits/' + folder + '/' + file + '.webp';
        });
    }
})();
