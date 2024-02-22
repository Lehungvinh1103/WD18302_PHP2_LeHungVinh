import axios from 'axios';
import Swal from 'sweetalert2';

if (document.querySelector('#form-signUp')) {

    Validator({
        form: '#form-signUp',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',

        rules: [
            Validator.isRequired('input[name="username"]', 'Vui lòng nhập username!'),
            Validator.isRequired('input[name="email"]', 'Vui lòng nhập email!'),
            Validator.isEmail('input[name="email"]', 'Email không đúng định dạng!'),
            Validator.isRequired('input[name="password"]', 'Vui lòng nhập mật khẩu!'),
            Validator.isRequired('input[name="confirmPassword"]', 'Vui lòng nhập mật khẩu!'),
            Validator.isPassword('input[name="password"]', '6', '* Mật khẩu tối thiểu 6 ký tự và 1 ký tự đặt biệt!', true),
            Validator.isConfirmed('input[name="confirmPassword"]', function () {
                return document.querySelector('input[name="password"]').value;
            }, '* Mật khẩu nhập lại không chính xác!'),
        ],

        onSubmit: (data) => {
            console.log(data)
            axios.post(`${webRoot}/dang-ky`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data);
                    if (response.data.success) {
                        Swal.fire({
                            title: 'Đăng ký thành công',
                            icon: 'success',
                        }).then(result => {
                            if(result.isConfirmed) {
                                window.location.href = '/dang-nhap';
                            }
                        })
                        
                    }else{
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