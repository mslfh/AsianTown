"use strict";
var ctx = document.getElementById('myChart').getContext('2d');

// 计算平均锻炼时间
var exerciseData = [30, 45, 60, 50, 55, 40, 60];
var total = exerciseData.reduce((a, b) => a + b, 0);
var avg = total / exerciseData.length;

var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['02-01', '02-02', '02-03', '02-04', '02-05', '02-06', '02-07'],
    datasets: [{
      label: 'Exercise Time',
      data: exerciseData,
      fill: false,
      borderColor: 'rgb(0, 0, 139)',
      borderWidth: 1.5,  // 设置线段粗细
      tension: 0.3
    },
    {
      label: 'Average Exercise Time',
      data: Array(exerciseData.length).fill(avg),
      fill: false,
      borderColor: 'rgb(128, 128, 128)',  // 设置线段颜色为灰色
      borderWidth: 1,  // 设置线段粗细
      borderDash: [5, 5],
      tension: 0.1
    }]
  },
  options: {
    scales: {
      x: {
        type: 'time',
        time: {
          unit: 'day',
          displayFormats: {
            day: 'MMM D'
          },
          tooltipFormat: 'll'
        },
        title: {
          display: true,
          text: 'Date'
        }
      },
      y: {
        title: {
          display: true,
          text: 'Exercise Time (minutes)'
        }
      }
    }
  }
});

var ctx = document.getElementById("myChart2").getContext('2d');

// 创建渐变
var gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(78, 115, 223, 1)');   // 蓝色
gradient.addColorStop(1, 'rgba(78, 115, 223, 0.1)'); // 蓝色透明

var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    datasets: [{
      label: 'Exercise Time',
      data: [30, 45, 60, 50, 55, 40, 60],  // 每天的锻炼时间
      borderWidth: 2,
      backgroundColor: gradient,  // 使用渐变颜色
      borderColor: '#4e73df',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 10  // 更改步长以适应新的数据范围
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

var ctx = document.getElementById("myChart3").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        80,
        50,
        40,
        30,
        20,
      ],
      backgroundColor: [
        '#191d21',
        '#63ed7a',
        '#ffa426',
        '#fc544b',
        '#6777ef',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Black',
      'Green',
      'Yellow',
      'Red',
      'Blue'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        80,
        50,
        40,
        30,
        100,
      ],
      backgroundColor: [
        '#191d21',
        '#63ed7a',
        '#ffa426',
        '#fc544b',
        '#6777ef',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Black',
      'Green',
      'Yellow',
      'Red',
      'Blue'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});