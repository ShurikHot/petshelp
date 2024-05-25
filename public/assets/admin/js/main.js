(function($) {

    //Анімація меню адмінки
    $('.nav-sidebar a').each(function(){
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if(link == location){
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });

    //АРІ сервісу погоди (тренування)
    const weatherBl = document.querySelector('.weather-widget')
    if (weatherBl) {
        weatherBl.innerHTML = `
            <img src="{{asset('assets/front/images/spinner-1s-200px.gif')}}" alt="Weather Icon" class="weather-icon">
        `
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'weather',
            type: 'POST',
            success: function(response) {
                let temp = Math.round(response.main.temp);
                let ico = response.weather[0].icon;

                weatherBl.innerHTML = `
                    <img src="https://openweathermap.org/img/wn/${ico}@2x.png" alt="Weather Icon" class="weather-icon">
                    <div class="temperature"></div>
                    <div class="description"></div>
                    <div class="location"></div>
                `
                $('.temperature').text(temp + '°C')
                $('.description').text(response.weather[0].description)
                $('.location').text(response.name + ', ' + response.sys.country)
            },
            error: function(xhr, status, error) {
                console.log('error');
            }
        })
    }

    //АРІ сервісу музики (тренування)
    /*const spotifyBl = document.querySelector('.artist-info')

    $('#find-button').on('click', function () {
        artist_id = $('#artist').val();
        if (artist_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `spotify/${artist_id}`,
                type: 'GET',
                success: function (response) {
                    spotifyBl.innerHTML = `
                        <img src="${response.images[2].url}">
                        <div>${response.name}</div>
                        <div><a href="${response.external_urls.spotify}">Link</a></div>
                        <div>${response.genres[0]}</div>
                    `
                },
                error: function(xhr, status, error) {
                    console.log('error');
                }
            })
        }
        $('#artist').val('');
    })*/


})(jQuery);

//Завантаження та обрізання фото тварини
window.addEventListener('DOMContentLoaded', function () {
    var image = document.getElementById('uploadedAvatar');
    var input = document.getElementById('photo');
    var slider_crop = document.getElementById('slider_crop');
    var cropBtn = document.getElementById('crop');

    var $modal = $('#cropAvatarmodal');
    var cropper;
    var aspectRatio;

    $('[data-toggle="tooltip"]').tooltip();

    if (document.getElementById('photo')) {
        input.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;

            if (files && files.length > 0) {
                let file = files[0];
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $modal.on('shown.bs.modal', function () {
            if (slider_crop && slider_crop.innerHTML.trim() !== '') {
                aspectRatio = '3 / 2'
            } else {
                aspectRatio = '1'
            }
            cropper = new Cropper(image, {
                aspectRatio: aspectRatio,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        cropBtn.addEventListener('click', function () {
            var canvas;
            var width;
            var height;
            if (slider_crop && slider_crop.innerHTML.trim() !== '') {
                width = 0;
                height = 0;
            } else {
                width = 1200;
                height = 1200;
            }
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: width,
                    height: height,
                });

                canvas.toBlob(function (blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        var base64data = reader.result;
                        $('#base64image').val(base64data);
                        document.getElementById('avatar').src = base64data;
                        $modal.modal('hide');
                    }
                });
            }
        });
    }
});
