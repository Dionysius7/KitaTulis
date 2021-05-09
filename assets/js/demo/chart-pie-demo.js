// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var chart_data = document.getElementById("chartdata");
var active_user = chart_data.getAttribute("data-active");
var deactive_user = parseInt(chart_data.getAttribute("data-deactive"));
var blocked_user = parseInt(chart_data.getAttribute("data-blocked"));
var post_count = parseInt(chart_data.getAttribute("data-post"));

console.log(blocked_user);

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Active", "Not Active", "Blocked", "Post"],
    datasets: [{
      data: [active_user, deactive_user, blocked_user, post_count],
      backgroundColor: ['#4e73df', '#F6C23E', '#E74A3B', '#1CC88A'],
      hoverBackgroundColor: ['#4e73df', '#F6C23E', '#E74A3B', '#1CC88A'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(0,0,0)",
      bodyFontColor: "#fff",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 80,
  },
});
