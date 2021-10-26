document.addEventListener('DOMContentLoaded', function () {
    let input_checked = document.querySelectorAll('input:checked');
    input_checked.forEach(el_checked => {
        el_checked.checked = false;
    });

    const postData = async (url, fData) => {
        let fetchResponse = await fetch(url, {
            method: 'POST',
            body: fData
        });

        return await fetchResponse.text();
    };

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('gallery-btn')) {
            e.preventDefault();
            const form=document.querySelector('.gallery-list');
            let formData = new FormData(form);
            let images = document.querySelectorAll('.check-del');

            postData(`${location.origin}/helpers/deleteImages.php`, formData)
                .then(function () {
                    images.forEach(item => {
                        if (item.checked) {
                            item.parentElement.parentElement.remove();
                        }
                    });
                    if (document.querySelectorAll('.gallery-item').length === 0) {
                        document.querySelector('.container-gallery').innerHTML = `<div class="no-photo">Нет фото</div>`;
                    }
                });
        }
    });
});