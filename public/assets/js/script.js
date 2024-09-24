/* -----------------------------------------------------humbargur toggle btn------------------------------------------- */
document.getElementById('toggle-button').addEventListener('click', function(){
    document.getElementById('left-sidebar').classList.toggle('notexpand');
});
document.querySelector('#left-sidebar').addEventListener('mouseenter', function(){
    document.getElementById('left-sidebar').classList.remove('notexpand');
});
/* -----------------------------------------------------Active color------------------------------------------- */

var currentPageUrl = window.location.href;
var menuItems = document.querySelectorAll('.navbar-item');
var dropdownItems = document.querySelectorAll('.dropdown-item');
menuItems.forEach(item=> {
    var itemLink = item.querySelector('.navbar-link');

    if (itemLink.href === currentPageUrl) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
  dropdownItems.forEach(item => {
    var link = item.querySelector('.dropdown-link');
    if (link) { // Check if link exists before accessing its properties
        if (link.href === currentPageUrl) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    }
});

/* -----------------------------------------------------Line chart------------------------------------------- */
document.addEventListener("DOMContentLoaded", function() {
    var lineChart = document.getElementById('lineChart').getContext('2d');
    var barChart = document.getElementById('barChart').getContext('2d');
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Bill Generate',
            data: [10, 50, 30, 40, 80, 60, 30],
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    var lineChart = new Chart(lineChart, {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var barChart = new Chart(barChart, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
