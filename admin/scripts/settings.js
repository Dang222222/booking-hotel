let general_data;

// Hàm lấy dữ liệu đổ ra màn hình
function get_general() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');

    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        
        // Đổ ra text hiển thị
        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        // Đổ vào input trong Modal
        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;
    }

    xhr.send('get_general'); 
}

// Hàm cập nhật dữ liệu
document.getElementById('general_s_form').addEventListener('submit', function(e){
    e.preventDefault();
    upd_general(site_title_inp.value, site_about_inp.value);
});

function upd_general(site_title_val, site_about_val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var myModal = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 1) {
            alert('Thành công! Đã cập nhật thông tin.');
            get_general(); // Load lại data mới
        } else {
            alert('Lỗi! Không có thay đổi nào.');
        }
    }

    xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
}

// Chạy hàm ngay khi load trang
window.onload = function(){
    get_general();
}