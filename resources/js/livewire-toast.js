import toastr from 'toastr';

window.addEventListener('category-saved', event => {
    toastr.success(event.detail.message);
});


// import toastr from 'toastr';
// import 'toastr/build/toastr.css';

// window.addEventListener('category-saved', event => {
//     toastr.success(event.detail.message, 'Success', {
//         timeOut: 2000, // Set the duration in milliseconds
//         closeButton: true,
//         progressBar: true,
//     });
// });
