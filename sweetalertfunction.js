
$('.tombol-hapus').on('click', function (e) {
    
    e.preventDefault();
    var href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.value) {
          window.location.href = href;
        }
      })
});