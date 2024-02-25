import axios from 'axios';
import Swal from 'sweetalert2';

const btn_delete = document.querySelectorAll('.btn-delete');
btn_delete.forEach(ele => {
    ele.addEventListener('click', (e) => {
        const id = e.target.getAttribute('data-id');        

        if (document.querySelector(`#formDelete_${id}`)) {

            Validator({
                form: `#formDelete_${id}`,
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',

                rules: [
                    Validator.isRequired('input[name="file_id"', 'ID trống')
                ],

                onSubmit: (data) => {
                    Swal.fire({
                        title: "Bạn có chắc muốn xóa?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Xóa"
                    }).then((result) => {

                        if (result.isConfirmed) {
                            try {
                                axios.post(`${webRoot}/deleteFile`, data, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                }).then(response => {
                                    console.log(response.data);
                                    if (response.data.status == 'success') {
                                        Swal.fire({
                                            title: "Xóa thành công!",
                                            icon: "success"
                                        }).then(resultt => {
                                            if (resultt.isConfirmed) {
                                                window.location.href = '/thung-rac';
                                            }
                                        })
                                    } else {
                                        Swal.fire({
                                            title: 'Lỗi khi xóa!',
                                            icon: 'error',
                                        })
                                    }
                                })
                            } catch (error) {
                                Swal.fire({
                                    title: "Lỗi khi xóaaaa!",
                                    icon: "error"
                                });
                            }

                        }
                    });
                }
            });


        }

    })
});






