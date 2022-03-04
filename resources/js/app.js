require('./bootstrap');
let submit_button = document.getElementById('submit');
let emptyFieldTitle = document.getElementById('EmptyFieldTitle');
submit_button.addEventListener('click', function () {
    let link = document.getElementById('url');
    if (link.value == '') {
        link.style.border = '2px solid red';
        emptyFieldTitle.style.display = 'block';
        emptyFieldTitle.innerHTML = 'You must enter a URL';
    } else {
        let prevShortUrl = document.getElementById('shortUrlDiv');
        if (prevShortUrl != null) {
            prevShortUrl.remove();
        }
        document.getElementById('EmptyFieldTitle').style.display = 'none';
        link.style.border = '';
        $.ajax({
            url: '/createAndGetShortLink',
            method: 'post',
            dataType: 'json',
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), link: link.value},
            success: function (data) {
                console.log(data);
                if (data.status == 'ok') {
                    $('#container').prepend(`<div id="shortUrlDiv" class="mb-3">
                                                    <label for="shortUrl">Your short URL:</label>
                                                    <a id="shortUrl" target="_blank" href="https://${data.original_link}">${data.short_link}</a>
                                               </div>`);
                } else if (data.status == 'error') {
                    console.log(322);
                    emptyFieldTitle.style.display = 'block';
                    emptyFieldTitle.innerHTML = 'Save error';
                }
            },
            error: function(data) {
                emptyFieldTitle.style.display = 'block';
                emptyFieldTitle.innerHTML = 'Something wrong, please try again later';
            }
        });
    }
});
