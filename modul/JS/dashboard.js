document.querySelectorAll("button").forEach(function(anak){
    anak.addEventListener("click",function(y){

      
      var tombol = this.className;
      var bottom = this.parentNode;
      var resultbarang = "";
      var resultjumlah = "";
      console.log(tombol);
      document.querySelectorAll(".namabarang li").forEach(nama =>{
    resultbarang += nama.innerHTML + ";";
    })
document.querySelectorAll(".jumlahbarang li").forEach(nama =>{
    resultjumlah += nama.innerHTML + ";";
    })
      var order_act = new FormData;
      order_act.append('action',tombol);
      order_act.append('id',bottom.id);
      order_act.append('namabarang',resultbarang);
      order_act.append('jumlahbarang',resultjumlah);
      
      
      fetch('config/order_selesai.php', {
    method: 'POST',
    body: order_act,
  }).then(function(response) {
    return response.json();
  }).then(function(data) {
    alert(data.message);
    document.getElementById(bottom.id).remove();
    location.reload()

    
  }).catch(function(error) {
    console.error('Error:', error);
  });

    })
  })
    