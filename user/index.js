
const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});





const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

function loader(){
    document.getElementById("preloader").style.display = 'none';
 }
 
 function fadeOut(){
    setInterval(loader, 1500);
 }
 
 window.onload = fadeOut;

const toggler = document.getElementById('theme-toggle');
let t = localStorage.getItem('darkMode') === 'true' ? 1 : 0;

function updateTheme() {
    if (t === 1) {
        document.body.classList.add('dark');
        toggler.checked = true;
    } else {
        document.body.classList.remove('dark');
        toggler.checked = false;
    }
}

updateTheme(); // Call the function on page load

toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        t = 1;
    } else {
        document.body.classList.remove('dark');
        t = 0;
    }
    localStorage.setItem('darkMode', this.checked);
});

// If you have other pages, you need to run updateTheme() on those pages too.


// const toggler = document.getElementById('theme-toggle');
// let t = 0; // Initialize t to 0 (for false)

// // Initial setup based on the value of t
// if (t === 1) {
//     document.body.classList.add('dark');
//     toggler.checked = true;
// } else {
//     document.body.classList.remove('dark');
//     toggler.checked = false;
// }

// toggler.addEventListener('change', function () {
//     if (this.checked) {
//         document.body.classList.add('dark');
//         t = 1;
//     } else {
//         document.body.classList.remove('dark');
//         t = 0;
//     }
// });
