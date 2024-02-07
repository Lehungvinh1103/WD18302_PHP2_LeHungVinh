import axios from 'axios';
import Swal from 'sweetalert2';

if (document.querySelector('#form-login')) {

    Validator({
        form: '#form-login',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',

        rules: [
            Validator.isRequired('input[name="email"]', 'Vui lòng nhập email!'),
            Validator.isEmail('input[name="email"]', 'Email không đúng định dạng!'),
            Validator.isRequired('input[name="password"]', 'Vui lòng nhập mật khẩu!'),
        ],

        onSubmit: (data) => {
            console.log(data)
            axios.post(`${webRoot}/dang-nhap`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data);
                    if (response.data.success) {
                        Swal.fire({
                            title: 'Đăng nhập thành công',
                            icon: 'success',
                        }).then(result => {
                            if(result.isConfirmed) {
                                window.location.href = '/';
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Lỗi! Email hoặc mật khẩu không đúng',
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