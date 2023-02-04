function batal(){
    alert("Anda melebihi batas stock")
  }
  
    
    function maupesan(id,stock){
    
      var fieldjml = document.createElement('input')
  fieldjml.classList = 'field-total'
  fieldjml.type = 'number'
  fieldjml.min = '1'
  fieldjml.max = stock
  fieldjml.value = '1'
  fieldjml.id = 'field-total-'+ id
  fieldjml.name = 'field-total-'+ id
  var cancel = document.createElement('span')
  cancel.innerText = 'Cancel'
  cancel.classList = 'btn btn-danger'
  cancel.setAttribute('onclick', 'batal(this.id)')
  cancel.id = id
  
  document.getElementById(id).classList.add('btn-pesan')
  document.getElementById('head-' + id).append(fieldjml)
  document.getElementById('head-' + id).append(cancel)
    }
    function batal(id){
      
      var deletefield=document.getElementById('field-total-' + id)
      var parent = document.getElementById('head-' + id)
      parent.removeChild(deletefield)
      parent.querySelector(".btn-danger").remove()
      parent.querySelector(".btn-success").classList.remove('btn-pesan')
    }
  
  
  
  document.querySelector(".pilih-warung").addEventListener("change", function() {
    var selectedOption = this.options[this.selectedIndex];
    var optionID = selectedOption.getAttribute("id");
    $.post('config/pilihan-menu.php', {id: optionID}, function(data) {
      $(".barang").html(data);
          });
  });
  
  document.querySelector("button").addEventListener("click", function(){
    let jumlahorder= ""; 
    let kode_barang= "";
    var input = document.querySelectorAll(".field-total")
    input.forEach(function(input){
      parenid = input.parentNode.id;
      var paren = document.getElementById(parenid).querySelector("h5");
      var idh5 = paren.id;
      kode_barang = kode_barang +idh5 + "; ";
      jumlahorder = jumlahorder +input.value + "; ";
  
      
    })
   
    var select = document.querySelector(".pilih-warung")
    var selectedOption = select.options[select.selectedIndex];
    var optionID = selectedOption.getAttribute("id"); 
    var formData = new FormData(document.querySelector("form"));
    formData.append('id',optionID);
    formData.append('kode_barang', kode_barang);
    formData.append('jumlahorder', jumlahorder);
      fetch('config/order.php', {
      method: 'POST',
      body: formData,
    }).then(function(response) {
      return response.json();
    }).then(function(data) {
      alert(data.message);
    }).catch(function(error) {
      console.error('Error:', error);
    });
  
  })
  
  