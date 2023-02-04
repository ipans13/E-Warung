document.querySelector(".btn-primary").addEventListener("click", function(){
          console.log("isjdis");
            var data = new FormData(document.querySelector("form"))

            fetch('./validasi_login.php', {
      method: 'POST',
      body: data,
    }).then(function(response) {
      return response.json();
    }).then(function(data) {
      if(data.status == 1){
      location.href = "./dashboard.php"
      }
      else{
      alert(data.message);
      }
    }).catch(function(error) {
      console.error('Error:', error);
    });
        })