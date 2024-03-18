const pageTitle = document.title;

// Find the element with the matching ID (assuming the ID is the same as the page title)
const targetElement = document.getElementById(pageTitle);

// Add the "active" class to the target element if found
if (targetElement) {
  targetElement.classList.add('active');
}

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

  // var loader = document.getElementById("preloader");

  // window.addEventListener("load",function(){
  //   loader.style.display="none";
  // },20000)

  function loader(){
   document.getElementById("preloader").style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

window.onload = fadeOut;
