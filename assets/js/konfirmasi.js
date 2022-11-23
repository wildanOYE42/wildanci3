function hapusMenu(url) {
    swal.fire({
        title: 'Are You Sure',
        text: "Yakin Kids!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'YA, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    })
}
function hapusSubMenu(url) {
    swal.fire({
        title: 'Are You Sure',
        text: "Yakin Kids!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'YA, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    })
}