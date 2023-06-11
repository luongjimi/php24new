function userDown() {
    document.querySelector(".nd_us_top").classList.toggle("hienthi");
   };
window.onclick = function(e) {
    if (!e.target.matches('.nut_drop')) {
    var noiDungDropdown = document.querySelector(".nd_us_top");
        if (noiDungDropdown.classList.contains('hienthi')) {
        noiDungDropdown.classList.remove('hienthi');
        }
    }
};


function opennav() {
    document.getElementById("side").style.width="270px";
};
function closenav() {
    document.getElementById("side").style.width="0";
};

// popup cai dat user, to cao, ...
function myFunction01() {
    var x1 = document.getElementById("qly_us");
    if (x1.style.display === "none") {
      x1.style.display = "flex";
      } else {
        x1.style.display = "none";
      }
    };
  
    function myFunction02() {
      var xz2 = document.getElementById("qly_us2");
      if (xz2.style.display === "none") {
        xz2.style.display = "flex";
        } else {
          xz2.style.display = "none";
        }
      };

      function myFunction03() {
        var xz3 = document.getElementById("fler_us");
        if (xz3.style.display === "none") {
          xz3.style.display = "flex";
          } else {
            xz3.style.display = "none";
          }
        };


        function myFunction04() {
          var xz4 = document.getElementById("fler_us2");
          if (xz4.style.display === "none") {
            xz4.style.display = "flex";
            } else {
              xz4.style.display = "none";
            }
          };
  
          function myFunction05() {
            var xz5 = document.getElementById("qly_us4");
            if (xz5.style.display === "none") {
              xz5.style.display = "flex";
              } else {
                xz5.style.display = "none";
              }
            };
  
            function openForm() {
              document.getElementById("myForm").style.display = "block";
          };
              
          function closeForm() {
              document.getElementById("myForm").style.display = "none";
          };


          function openForm3() {
            document.getElementById("myForm2").style.display = "block";
        };
            
        function closeForm3() {
            document.getElementById("myForm2").style.display = "none";
        };

