let general_data;

// ======================
// TOAST ALERT
// ======================
function custom_alert(type, msg) {

    let bs_class =
        (type == 'success')
        ? 'alert-success'
        : 'alert-danger';

    let element = document.createElement('div');

    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert"
             role="alert"
             style="
                position: fixed;
                top: 80px;
                right: 25px;
                z-index: 1111;
                min-width: 300px;
             ">

            <strong class="me-3">${msg}</strong>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>
    `;

    document.body.append(element);

    setTimeout(() => {
        element.remove();
    }, 2000);
}


// ======================
// LẤY DỮ LIỆU
// ======================
function get_general() {

    let site_title_inp =
        document.getElementById('site_title_inp');

    let site_about_inp =
        document.getElementById('site_about_inp');

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/settings_crud.php", true);

    xhr.setRequestHeader(
        'Content-Type',
        'application/x-www-form-urlencoded'
    );

    xhr.onload = function () {

        try {

            general_data = JSON.parse(this.responseText);

            site_title_inp.value =
                general_data.site_title;

            site_about_inp.value =
                general_data.site_about;

        } catch(error) {

            custom_alert(
                'danger',
                'Lỗi load dữ liệu!'
            );
        }
    }

    xhr.send('get_general=1');
}


// ======================
// SUBMIT FORM
// ======================
document.getElementById('site_settings_form')
.addEventListener('submit', function (e) {

    e.preventDefault();

    upd_general();
});


// ======================
// UPDATE DỮ LIỆU
// ======================
function upd_general() {

    let site_title_val =
        document.getElementById('site_title_inp').value;

    let site_about_val =
        document.getElementById('site_about_inp').value;

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/settings_crud.php", true);

    xhr.setRequestHeader(
        'Content-Type',
        'application/x-www-form-urlencoded'
    );

    xhr.onload = function () {

        if (this.responseText == 1) {

            custom_alert(
                'success',
                'Cập nhật thành công!'
            );

            get_general();

        } else {

            custom_alert(
                'danger',
                'Không có thay đổi nào!'
            );
        }
    }

    xhr.send(
        'site_title=' + encodeURIComponent(site_title_val) +
        '&site_about=' + encodeURIComponent(site_about_val) +
        '&upd_general=1'
    );
}


// ======================
// LOAD PAGE
// ======================
window.onload = function () {
    get_general();
}