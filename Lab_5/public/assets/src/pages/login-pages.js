import axios from 'axios';

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
                        window.location.href = '/';
                    } else {
                        const error = document.getElementById('errMessage');

                        if (error) {
                            const errorMessage = 'Email hoặc mật khẩu không đúng';
                            error.innerHTML = `<p>${errorMessage}</p>`;
                        } 
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    })

}