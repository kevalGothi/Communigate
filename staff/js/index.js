const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
})

const pageTitle = document.title;

// Find the element with the matching ID (assuming the ID is the same as the page title)
const targetElement = document.getElementById(pageTitle);

// Add the "active" class to the target element if found
if (targetElement) {
  targetElement.classList.add('active');
}

function togglePasswordVisibility() {
    var x = document.getElementById("myInput");
    var eyeIcon = document.getElementById("eyeIcon");
    
    if (x.type === "password") {
      x.type = "text";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    } else {
      x.type = "password";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    }
  }

  function loader(){
    document.getElementById("preloader").style.display = 'none';
 }
 
 function fadeOut(){
    setInterval(loader, 800);
 }
 
 window.onload = fadeOut;
// Orders.forEach(order => {
//     const tr = document.createElement('tr');
//     const trContent = `
//         <td>${order.productName}</td>
//         <td>${order.productNumber}</td>
//         <td>${order.paymentStatus}</td>
//         <td class="${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
//         <td class="primary">Details</td>
//     `;
//     tr.innerHTML = trContent;
//     document.querySelector('table tbody').appendChild(tr);
// });

// const links = document.querySelectorAll('.sidebar a');

// // Add click event listeners to each link
// links.forEach(link => {
//   link.addEventListener('click', function(event) {
//     // Remove the "active" class from all links
//     links.forEach(link => {
//       link.classList.remove('active');
//     });

//     // Add the "active" class to the clicked link
//     link.classList.add('active');
//   });
// });
