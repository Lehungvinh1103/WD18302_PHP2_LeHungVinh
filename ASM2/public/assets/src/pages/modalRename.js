// import axios from 'axios';
// import Swal from 'sweetalert2';

// const btn_rename = document.querySelectorAll('.btn-rename');
// console.log(btn_rename)
// btn_rename.forEach(ele => {
//     ele.addEventListener('click', (e) => {
//         const id = e.target.getAttribute('data-id');        
// console.log(id);
// console.log(document.querySelector(`[name="file_name_${id}"]`));
// console.log(document.querySelector(`#modalRename_${id}`));


//         if (document.querySelector(`#formRe_${id}`)) {

//             Validator({
//                 form: `#formRe_${id}`,
//                 formGroupSelector: '.form-group',
//                 errorSelector: '.form-message',
//                 modal: `#modalRename_${id}`, 
        
//                 rules: [
//                     Validator.isRequired(`input[name="file_name_${id}"]`, 'Tên file không được để trống!')
//                 ],
        
//                 onSubmit: (data, e) => {
//                     axios.post(`${webRoot}/renameFile`, data, {
//                         headers: {
//                             'Content-Type': 'multipart/form-data'
//                         }
//                     })
//                         .then(response => {
//                             console.log(response.data);
//                             if (response.data.status == 'success') {
//                                 Swal.fire({
//                                     title: 'File tải lên thành công ',
//                                     icon: 'success',
//                                 }).then(result => {
//                                     if (result.isConfirmed) {
//                                         window.location.href = '/my-file';
//                                     }
//                                 })
//                             } else {
//                                 Swal.fire({
//                                     title: 'Có lỗi khi tải file lên',
//                                     icon: 'error',
//                                 })
//                             }
//                         })
//                         .catch(error => {
//                             console.error('Error:', error);
//                         });
//                 }
//             })
        
//         }
        

//     })
// });






