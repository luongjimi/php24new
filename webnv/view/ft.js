$(document).ready(function(){
    $("#od121").click(function(){
      $("#od122").slideToggle();
    });
  });

  
  function openForm3() {
    document.getElementById("myForm2").style.display = "block";
};
    
function closeForm3() {
    document.getElementById("myForm2").style.display = "none";
};


function openForm4() {
  document.getElementById("myForm3").style.display = "block";
};
  
function closeForm4() {
  document.getElementById("myForm3").style.display = "none";
};

$(document).ready(function(){
  $('#name').on('change', function() {
    $(".data_nap").hide();
    $('#' + $(this).val()).fadeIn(450);
  }).change();
});


const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'VND',
  minimumFractionDigits: 0
})


$(document).ready(function(){
  $('#name2').on('change', function() {
    $(".code_nv1").hide();
    $('#' + $(this).val()).fadeIn();
    var loaisp2 = $(this).val();
    if(loaisp2 == 1 || loaisp2 == 2 ){
      gia_sp2 = 650;
    } else if (loaisp2 == 3){
      gia_sp2 = 800;
    } else if (loaisp2 == 5) {
      gia_sp2 = 14500;
    }else if (loaisp2 == 4) {
      gia_sp2 = 1750;
    };
    var soluong = $('#gia1').val();
    last_price = soluong * gia_sp2;
    $('#gia2').text(formatter.format(last_price));
    
  }).change();
});


$(document).ready(function() {
  $('#gia1').change(function() {
      var loaisp = $('#name2').val();
      var gia_sp = 0;
      if(loaisp == 1 || loaisp == 2 ){
        gia_sp = 650; // 450 lai 200
      } else if (loaisp == 3){
        gia_sp = 800; // 650 lai 150
      } else if (loaisp == 5) {
        gia_sp = 14500; // 12000 lai 1500
      }else if (loaisp == 4) {
        gia_sp = 1750; // 1600 lai 250
      };
      var soluong = $(this).val();
        last_price = soluong * gia_sp;
        $('#gia2').text(formatter.format(last_price));
        
  });
});
