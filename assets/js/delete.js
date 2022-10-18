$(document).ready(function () {

    $(".delete").on("click", function() {
        var nip = $(this).data("nip");
        var halaman = $(this).data("halaman");
        var action = $(this).data("action");
        Konfirmasi(nip, halaman, action);
    });

    function Konfirmasi(nip, halaman, action) {
        bootbox.confirm("Yakin ingin menghapus ? ", function(result) {
        if (result) {
            $.ajax({
            url : action+nip,
            method : "POST",
            data : {
                'nip' : nip
            }
            }).done(function(json) {
            var msg = JSON.parse(json);

            if (msg.say === "ok") {
                window.location.href = halaman;
            } else {
                $.gritter.add({
                title : "Informasi Penghapusan !",
                text : "Gagal !"
                });
                return false;
            }
            })
        }
        })
    }
});