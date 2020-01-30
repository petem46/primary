function successAlert(title) {
Swal.fire({
  type: 'success',
  title: title,
  showConfirmButton: false,
  timer: 1500
})
}

function warningAlert(title) {
  Swal.fire({
    type: 'warning',
    title: title,
    showConfirmButton: false,
    timer: 1500
  })
}

function confirmDelete(titleText, destroy) {
  Swal.fire({
    title: 'Delete ' + titleText + ', are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3498DB',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      window.open(destroy, "_self");
    }
  })
}