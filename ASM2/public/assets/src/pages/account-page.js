import axios from 'axios';
import Swal from 'sweetalert2';

if (document.querySelector('#formInfo')) {

    Validator({
        form: '#formInfo',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',

        rules: [
            Validator.isRequired('input[name="fullname"]', 'Vui lòng nhập họ tên!'),
            Validator.isRequired('input[name="email"]', 'Vui lòng nhập email!'),
            Validator.isEmail('input[name="email"]', 'Email không đúng định dạng!'),
            Validator.isRequired('input[name="phone"]', 'Vui lòng nhập số điện thoại!'),
            Validator.isPhoneNumber('input[name="phone"]', 'Số điện thoại không đúng định dạng'),

        ],

        onSubmit: (data) => {
            // console.log(data)
            axios.post(`${webRoot}/updateInfo`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data);
                    if (response.data.status == 'success') {
                        Swal.fire({
                            title: 'Cập nhật thành công',
                            icon: 'success',
                        }).then(result => {
                            if(result.isConfirmed) {
                                window.location.href = '/tai-khoan';
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Lỗi! ',
                            icon: 'error',
                        })
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    })

}


if (document.querySelector('#formPass')) {

    Validator({
        form: '#formPass',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',

        rules: [
            Validator.isRequired('input[name="current_pass"]', 'Vui lòng nhập mật khẩu cũ!'),
            Validator.isRequired('input[name="new_pass"]', 'Vui lòng nhập mật khẩu mới!'),
            Validator.isRequired('input[name="confirm_pass"]', 'Vui lòng xác nhận lại mật khẩu!'),
            Validator.isPassword('input[name="new_pass"]', '6', 'Mật khẩu tối thiểu 6 ký tự và 1 ký tự đặt biệt!', true),
            Validator.isConfirmed('input[name="confirm_pass"]', function() {
                return document.querySelector('input[name="new_pass"]').value;
            }, 'Mật khẩu nhập lại không chính xác!'),

        ],

        onSubmit: (data) => {
            // console.log(data)
            axios.post(`${webRoot}/updatePass`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data);
                    if (response.data.status == 'success') {
                        Swal.fire({
                            title: 'Cập nhật thành công',
                            icon: 'success',
                        }).then(result => {
                            if(result.isConfirmed) {
                                window.location.href = '/tai-khoan';
                            }
                        });
                    } else {
                        Swal.fire({
                            title: response.data.error,
                            icon: 'error',
                        })
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    })

}