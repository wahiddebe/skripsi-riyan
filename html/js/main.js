$(document).ready(function(){

  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var url = button.data('form');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function ()
    {
      if(this.readyState == 4 && this.status == 200)
      {
        document.getElementById("form-data").innerHTML = this.responseText;
      }
    };

    var currentURL =  window.location.origin+"/skripsi-riyan";
    xmlhttp.open("GET",currentURL+url,true);
    xmlhttp.send();
  })

  $('#myModal2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var url = button.data('form');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function ()
    {
      if(this.readyState == 4 && this.status == 200)
      {
        document.getElementById("form-data2").innerHTML = this.responseText;
      }
    };

    var currentURL =  window.location.origin+"/skripsi-riyan";
    xmlhttp.open("GET",currentURL+url,true);
    xmlhttp.send();
  })

  $('#myModal3').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var url = button.data('form');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function ()
    {
      if(this.readyState == 4 && this.status == 200)
      {
        document.getElementById("form-data3").innerHTML = this.responseText;
      }
    };

    var currentURL =  window.location.origin+"/skripsi-riyan";
    xmlhttp.open("GET",currentURL+url,true);
    xmlhttp.send();
  })
})


//# sourceMappingURL=main.js.map