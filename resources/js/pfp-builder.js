(function () {
    const canvas = document.getElementById('pfp-builder');
    const ctx = canvas.getContext('2d');

    const selects = document.getElementsByTagName('select');
    for (let i =  0; i < selects.length; ++i) {
        selects[i].addEventListener('change', buildImage);
    }

    document.querySelector('.pfp-download').addEventListener('click', function () {
        // Download canvas image as PNG file
        const image = canvas.toDataURL();
        const aDownloadLink = document.createElement('a');
        aDownloadLink.download = 'custom-nft.png';
        aDownloadLink.href = image;
        aDownloadLink.click();

        // Send the selected values to Gallery controller to generate the same image and store it in the /gallery folder
        const data = {};
        const selects = document.getElementsByTagName('select');
        for (let i =  0; i < selects.length; ++i) {
            const select = selects[i];
            data[select.getAttribute('name')] = select.value;
        }
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        fetch('/nft-gallery/build', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        });
    });

    buildImage();

    function drawImageScaled(image) {
        const hRatio = canvas.width / image.width;
        const vRatio = canvas.height / image.height;
        const ratio = Math.min(hRatio, vRatio);
        const centerShift_x = (canvas.width - image.width * ratio) / 2;
        const centerShift_y = (canvas.height - image.height * ratio) / 2;
        ctx.drawImage(
            image, 0,0, image.width, image.height,
            centerShift_x, centerShift_y, image.width*ratio, image.height*ratio
        );
    }

    function buildImage() {
        ctx.clearRect(0,0,canvas.width, canvas.height);
        const imagePromises = [];

        const selects = document.getElementsByTagName('select');
        for (let i =  0; i < selects.length; ++i) {
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
            const image = new Image();

            image.onload = function(){
                resolve(image);
            };

            image.onerror = function (err) {
                reject(err);
            }

            const folder = select.getAttribute('name');
            const file = select.value;
            image.src = '/traits/' + folder + '/' + file;
        });
    }
})();
