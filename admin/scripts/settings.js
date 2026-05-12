function custom_alert(type, msg) {
    let el = document.createElement('div');
    el.innerHTML = `
        <div class="alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show"
             role="alert"
             style="position:fixed;top:80px;right:25px;z-index:1111;min-width:300px;">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;
    document.body.append(el);
    setTimeout(() => el.remove(), 2500);
}

function get_general() {
    fetch('ajax/settings_crud.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'get_general=1'
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById('site_title_inp').value = data.site_title ?? '';
        document.getElementById('site_about_inp').value = data.site_about ?? '';
    })
    .catch(() => custom_alert('danger', 'Lỗi load dữ liệu!'));
}

document.getElementById('site_settings_form').addEventListener('submit', function(e) {
    e.preventDefault();
    let body = 'site_title=' + encodeURIComponent(document.getElementById('site_title_inp').value)
             + '&site_about=' + encodeURIComponent(document.getElementById('site_about_inp').value)
             + '&upd_general=1';
    fetch('ajax/settings_crud.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body
    })
    .then(r => r.text())
    .then(res => {
        custom_alert(res == 1 ? 'success' : 'danger', res == 1 ? 'Cập nhật thành công!' : 'Không có thay đổi nào!');
        if (res == 1) get_general();
    });
});

window.onload = get_general;
