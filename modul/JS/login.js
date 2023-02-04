document.querySelector(".btn-primary").addEventListener("click", function(){
          console.log("isjdis");
            var data = new FormData(document.querySelector("form"));

    
    $.ajax({
        url: './validasi_login.php',
        type: 'POST',
        data: data,
        async: false,
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == "1"){
            window.location.href = "./dashboard.php";
            alert(data.message);
            } else{
                alert(data.message);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
        });