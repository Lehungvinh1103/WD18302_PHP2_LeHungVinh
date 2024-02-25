import axios from 'axios';
import Swal from 'sweetalert2';

if (document.querySelector('#uploadForm')) {

    Validator({
        form: '#uploadForm',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        modal: '#exampleModal',

        rules: [
            Validator.isRequired('input[name="files[]"', 'Vui lòng chọn file')
        ],

        onSubmit: (data, e) => {
            const user_id = JSON.parse(localStorage.getItem('user')).user_id
            data.user_id = user_id;
            axios.post(`${webRoot}/api/files/add`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data);
                    if (response.data.status == 'success') {
                        Swal.fire({
                            title: 'File tải lên thành công ',
                            icon: 'success',
                        }).then(result => {
                            if (result.isConfirmed) {
                                window.location.href = '/my-file';
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Có lỗi khi tải file lên',
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

