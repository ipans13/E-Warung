const editableElements = document.querySelectorAll('.editnumber');

editableElements.forEach(function(el) {
  el.addEventListener('click', makeEditable);
});

function makeEditable(e) {
var bungkus = e.target.parentNode.parentNode;
var bungkusid = bungkus.id;
var trelement = document.getElementById(bungkusid);
let id = trelement.getElementsByTagName("td")[0].innerText;

let currchange = e.target.id;
  const target = e.target;
  const input = document.createElement('input');

  input.value = target.innerText;
  input.type = "number";
  target.innerText = '';
  target.appendChild(input);
  input.focus();

  input.addEventListener('blur', updateContent);
  input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
      updateContent();
    }

  })

  function updateContent() {
    if(input.value == ""){
      input.value = 0;
    }
    target.innerText = input.value;
    $.post('config/update_barang.php', {kode: id,item: currchange,text: input.value}, function(data) {
        });
    input.remove();

  }

  }
  document.querySelectorAll(".delete-barang").forEach(function(le) {le.addEventListener("click", function(event){
    var bungkus = event.target.parentNode.parentNode.id;
    var elementid = document.getElementById(bungkus)
    let id = elementid.getElementsByTagName("td")[0].innerText;
    $.post('config/hapus.php', {id: id}, function(data) {
      location.reload()
        });
  })
})
