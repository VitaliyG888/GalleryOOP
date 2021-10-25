document.addEventListener('DOMContentLoaded', function () {

    const postData = async (url, fData) => {
        let fetchResponse = await fetch(url, {
            method: 'POST',
            body: fData
        });
        return await fetchResponse.json();
    };

    document.addEventListener('click', (e) => {
        document.querySelector('.error-message').innerHTML = '';
        if (e.target.classList.contains('download-btn')) {
            const gallery = document.querySelector('.gallery-block');
            const form = document.querySelector('.download-form');
            let formData = new FormData(form);

            postData(`helpers/addImages.php`, formData)
                .then(function (response) {
                    if (response['error']) {
                        response['error'].forEach(inHTML => {
                            document.querySelector('.error-message').innerHTML += `<p class="error-message-error">${inHTML}</p>`;
                        })
                    }
                    document.querySelectorAll('.gallery-item').forEach(item => {
                        item.remove();
                    });
                    response['array'].forEach(fileAdd => {
                        let title = fileAdd[0].split('.').slice(0, -1).join('.');
                        let sizeTitle = fileAdd[2]['title'];
                        let sizeSymbol = fileAdd[2]['symbol'];
                        let fileHtml = `
                    <div class="gallery-item">
                        <a href="/upload/${fileAdd[0]}" title="${title}" class="gallery-link">
                            <img class="gallery-img" src="/upload/${fileAdd[0]}" alt="alt">
                        </a>
                        <label class="check-image">
                            <span class="date-image">${fileAdd[1]}</span>
                            <span class="size-image">${sizeTitle} ${sizeSymbol}</span>
                            <span class="name-image">${title}</span>
                            <input class="check-del" type="checkbox" name="delete[]" value="${fileAdd[0]}"/>
                        </label>
                    </div>`;
                        if (document.querySelector('.no-photo')) {
                            document.querySelector('.no-photo').remove();
                        }
                        gallery.insertAdjacentHTML('beforeend', fileHtml);
                    });
                    document.querySelector('.input__file').value = '';
                });


        } else if (e.target.classList.contains('images-btn')) {
            const form = document.querySelector('.images-form');
            let formData = new FormData(form);

            postData(`${location.origin}/helpers/addImages.php`, formData)
                .then(function (response) {
                    if (response['error']) {
                        response['error'].forEach(inHTML => {
                            document.querySelector('.error-message').innerHTML += `<p class="error-message-error">${inHTML}</p>`;
                        });
                    } else {
                        document.querySelector('.error-message').innerHTML = `<p class="error-message-success">Загрузка прошла успешно!</p>`;
                    }
                })
        }
    });
});