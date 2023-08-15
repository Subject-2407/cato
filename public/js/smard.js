$(document).ready(function () {
    $('#table-rfid').css("font-weight","400");
    startWs();
    loadData();
    $(".cons").hide();
    $("#con-registrasi").show();
    $("#registrasi").click(function (){
        $(".cons").hide();
        $("#con-registrasi").show();
    })
    $("#rfid").click(function (){
        $(".cons").hide();
        $("#con-rfid").show();
    })
    $("#siswa").click(function (){
        $(".cons").hide();
        $("#con-siswa").show();
    })
    $("#absensi").click(function (){
        $(".cons").hide();
        $("#con-absensi").show();
    })
    $("#selesai").click(function(){
        if(!$("#rfid-id").val() || (!$.trim($("#rfid-id").val()).length)
                || !$("#siswa-id").val() || (!$.trim($("#siswa-id").val()).length)
                || !$("#kelas-id").val() || (!$.trim($("#kelas-id").val()).length)
                || !$("#nis-id").val() || (!$.trim($("#nis-id").val()).length)
        ){
            $("#notification").text("Mohon masukkan input yang kosong!");
            $("#notification").css("color","red");
        } else {
            $.ajax({
                url:"https://ecato.my.id/api/rfid/" + $("#rfid-id").val(),
                type:"GET",
                async:true,
                success: function(){
                    $.ajax({
                        url:"https://ecato.my.id/api/rfid/" + $("#rfid-id").val() + "/user",
                        type:"GET",
                        async:true,
                        statusCode: {
                            200: function(){
                                $("#notification").text("Pengguna RFID sudah pernah didaftarkan!");
                                $("#notification").css("color","red");
                            },
                            404: function(){
                                $.ajax({
                                    type: 'POST',
                                    url: "https://ecato.my.id/api/rfid/" + $("#rfid-id").val() + "/user/create",
                                    async: true,
                                    data: {
                                        nis: $("#nis-id").val(),
                                        nama: $("#siswa-id").val(),
                                        kelas: $("#kelas-id").val(),
                                      },
                                    success: function(response) {
                                        $("#notification").text("Berhasil me-registrasi pengguna RFID!");
                                        $("#notification").css("color","green");
                                    },
                                    statusCode: {
                                        409: function(data){
                                            $("#notification").text(data.responseJSON.message);
                                            $("#notification").css("color","red");
                                        }
                                    }
                                });
                            }
                        }
                    });
                },
                statusCode: {
                    404: function(data){
                        $("#notification").text("Nomor RFID tidak ditemukan! Lihat menu Data RFID untuk melihat kartu yang sudah terdaftar");
                        $("#notification").css("color","red");
                        return;
                    }
                }
              });
        }
    })

    function startWs(){
        console.log("[WEBSOCKETS] Ready to receive WebSocket events.");
        Echo.channel('SMARD')
                  .listen('RFIDCard', (e) => {
                        var row = $('<tr>');
                        $('<td>').text(e.nomor_rfid).appendTo(row);
                        $('<td>').text(e.dibuat).appendTo(row);

                        row.appendTo($("#table-rfid"));
                  })
                  .listen('RFIDUser', (e) => {
                    var row = $('<tr>');
                    $('<td>').text(e.nis).appendTo(row);
                    $('<td>').text(e.nama).appendTo(row);
                    $('<td>').text(e.kelas).appendTo(row);
                    $('<td>').text(e.rfid).appendTo(row);

                    row.appendTo($("#table-siswa"));
                    })
                    .listen('Absensi', (e) => {
                        var row = $('<tr>');
                        $('<td>').text(e.nama).appendTo(row);
                        $('<td>').text(e.rfid).appendTo(row);
                        $('<td>').text(e.tanggal).appendTo(row);
                        row.appendTo($("#table-absensi"));
                        })
                }

            
                
    
    function loadData(){
        $.ajax({
            type: 'GET',
            url: 'https://ecato.my.id/api/robotik/rfid/index',
            success: function(data) {
              $.each(data, function(index, data) {
                var row = $('<tr>');
                var col1 = $('<td>').text(data.nomor_rfid);
                var col2 = $('<td>').text(data.dibuat);
                row.append(col1).append(col2);
                $('#table-rfid').append(row);
              });
            }
        });
        $.ajax({
            type: 'GET',
            url: 'https://ecato.my.id/api/rfid/index/user',
            success: function(data) {
              $.each(data, function(index, data) {
                var row = $('<tr>');
                var col1 = $('<td>').text(data.nis);
                var col2 = $('<td>').text(data.nama);
                var col3 = $('<td>').text(data.kelas);
                var col4 = $('<td>').text(data.rfid);
                row.append(col1).append(col2).append(col3).append(col4);
                $('#table-siswa').append(row);
              });
            }
        });
        $.ajax({
            type: 'GET',
            url: 'https://ecato.my.id/api/rfid/index/absensi',
            success: function(data) {
                var convertDate = (originalTimestamp) =>{
                    const dateObj = new Date(originalTimestamp);
                    const formattedDate = `${dateObj.getDate()} ${getMonthName(dateObj.getMonth())} ${dateObj.getFullYear()} ${formatTime(dateObj)}`;
        
                    function formatTime(dateObj) {
                        let hours = dateObj.getHours();
                        const minutes = dateObj.getMinutes();
                        const ampm = hours >= 12 ? 'PM' : 'AM';
                        hours %= 12;
                        hours = hours ? hours : 12;
                        return `${hours}:${padZero(minutes)} ${ampm}`;
                      }
                      
                      // helper function to get the month name from a given month number (0-based)
                      function getMonthName(month) {
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        return months[month];
                      }
                      
                      // helper function to pad a single-digit number with a leading zero
                      function padZero(num) {
                        return num < 10 ? `0${num}` : num;
                      }
                }
              $.each(data, function(index, data) {
                var row = $('<tr>');
                var col1 = $('<td>').text(data.nama);
                var col2 = $('<td>').text(data.rfid);
                var col3 = $('<td>').text(convertDate(data.created_at));
                console.log(convertDate(data.created_at));
                row.append(col1).append(col2).append(col3);
                $('#table-absensi').append(row);
              });
            }
        });
    }
});