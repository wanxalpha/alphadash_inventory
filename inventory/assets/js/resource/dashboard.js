cardColor = config.colors.white;
headingColor = config.colors.headingColor;
axisColor = config.colors.axisColor;
borderColor = config.colors.borderColor;

var options = {
    series: data_kpi,
    chart: {
        type: 'bar',
        height: 500
    },
    plotOptions: {
        bar: {
            horizontal: false,
            dataLabels: {
                position: 'top',
            },
        }
    },
    dataLabels: {
        enabled: true,
        offsetX: -6,
        style: {
            fontSize: '12px',
            colors: ['#fff']
        }
    },
    stroke: {
        show: true,
        width: 1,
        colors: ['#fff']
    },
    tooltip: {
        shared: true,
        intersect: false
    },
    
   
    // xaxis: {
    //     categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    // },
};

var chart = new ApexCharts(document.querySelector("#sales_kpi"), options);
chart.render();

var options_teams_kpi = {
  series: data_team_kpi,
  chart: {
      type: 'bar',
      height: 500
  },
  plotOptions: {
      bar: {
          horizontal: false,
          dataLabels: {
              position: 'top',
          },
      }
  },
  dataLabels: {
      enabled: true,
      offsetX: -6,
      style: {
          fontSize: '12px',
          colors: ['#fff']
      }
  },
  stroke: {
      show: true,
      width: 1,
      colors: ['#fff']
  },
  tooltip: {
      shared: true,
      intersect: false
  },
  
 
  // xaxis: {
  //     categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
  // },
};

var chart = new ApexCharts(document.querySelector("#sales_team_kpi"), options_teams_kpi);
chart.render();

//stock in
var stock_in = {

  series: data_stock_in,
  labels: data_label_funnel_status,
  dataLabels: {
      formatter: function (val, opts) {
          return opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex];
      },
    },
  chart: {
      type: 'pie',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
      },
  },
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }],
  
};

var chart = new ApexCharts(document.querySelector("#stock_in"), stock_in);
chart.render();

//stock in customer
var stock_in_customer = {

  series: data_stock_in_customer,
  labels: data_label_funnel_status,
  dataLabels: {
      formatter: function (val, opts) {
          return opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex];
      },
    },
  chart: {
      type: 'pie',
  },
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }],
  
};

var chart = new ApexCharts(document.querySelector("#stock_in_customer"), stock_in_customer);
chart.render();

//stock out
var stock_out = {

    series: data_stock_out,
    labels: data_label_funnel_status,
    dataLabels: {
        formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex];
        },
      },
    chart: {
        type: 'pie',
        events: {
            dataPointSelection: function (event, chartContext, config) {
                // console.log('seriesIndex', config.seriesIndex);
                // console.log('dataPointIndex', config.dataPointIndex);

                var status_month = $('#status_month').val();
                var status_year = $('#status_year').val();

                window.open('../sales_funnel?status='+config.dataPointIndex+'&year='+status_year+'&month='+status_month+'&product='+status_product, '_blank');
            },  
        },
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }],
    
};

var chart = new ApexCharts(document.querySelector("#sales_funnel"), stock_out);
chart.render();

//stock out customer
var stock_out_customer = {

  series: data_stock_out_customer,
  labels: data_label_funnel_status,
  dataLabels: {
      formatter: function (val, opts) {
          return opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex];
      },
    },
  chart: {
      type: 'pie',
      events: {
          dataPointSelection: function (event, chartContext, config) {
              // console.log('seriesIndex', config.seriesIndex);
              // console.log('dataPointIndex', config.dataPointIndex);

              var status_month = $('#status_month').val();
              var status_year = $('#status_year').val();

              window.open('../sales_funnel?status='+config.dataPointIndex+'&year='+status_year+'&month='+status_month+'&product='+status_product, '_blank');
          },  
      },
  },
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }],
  
};

var chart = new ApexCharts(document.querySelector("#stock_out_customer"), stock_out_customer);
chart.render();

//stock return
var stock_return = {

  series: data_stock_return,
  labels: data_label_stock_return,
  dataLabels: {
      formatter: function (val, opts) {
          return opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex];
      },
    },
  chart: {
      type: 'pie',
      events: {
          dataPointSelection: function (event, chartContext, config) {
              // console.log('seriesIndex', config.seriesIndex);
              // console.log('dataPointIndex', config.dataPointIndex);

              var status_month = $('#status_month').val();
              var status_year = $('#status_year').val();

              window.open('../sales_funnel?status='+config.dataPointIndex+'&year='+status_year+'&month='+status_month+'&product='+status_product, '_blank');
          },  
      },
  },
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }],
  
};

var chart = new ApexCharts(document.querySelector("#stock_return"), stock_return);
chart.render();

var options_sales_funnel_category = {
  series: data_funnel_category,
  labels: data_label_funnel_category,
  dataLabels: {
      formatter: function (val, opts) {
          return opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex];
      },
      style: {
        fontSize: "140px",
        fontFamily: "Helvetica, Arial, sans-serif",
        fontWeight: "bold"
      }
    },
  chart: {
      type: 'polarArea',
      events: {
          dataPointSelection: function (event, chartContext, config) {
              var category_month = $('#category_month').val();
              var category_year = $('#category_year').val();
              var category = (config.dataPointIndex + 1);

              window.open('../sales_funnel?year='+category_year+'&month='+category_month+'&category='+category, '_blank');
          },  
      },
  },
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }],
  
};



var chart = new ApexCharts(document.querySelector("#sales_funnel_category"), options_sales_funnel_category);
chart.render();



const totalRevenueChartEl = document.querySelector('#sales_marketing_demand'),
// totalRevenueChartOptions = {
//     series: data_pillar,
//     chart: {
//         height: 300,
//         stacked: true,
//         type: 'bar',
//         toolbar: {
//             show: false
//         }
//     },
//     plotOptions: {
//         bar: {
//             horizontal: false,
//             columnWidth: '33%',
//             borderRadius: 12,
//             startingShape: 'rounded',
//             endingShape: 'rounded'
//         }
//     },
//     dataLabels: {
//         enabled: false
//     },
//     stroke: {
//         curve: 'smooth',
//         width: 6,
//         lineCap: 'round',
//         colors: [cardColor]
//     },
//     legend: {
//         show: true,
//         horizontalAlign: 'left',
//         position: 'top',
//         markers: {
//             height: 8,
//             width: 8,
//             radius: 12,
//             offsetX: -3
//         },
//         labels: {
//             colors: axisColor
//         },
//         itemMargin: {
//             horizontal: 10
//         }
//     },
//     grid: {
//         borderColor: borderColor,
//         padding: {
//             top: 0,
//             bottom: -8,
//             left: 20,
//             right: 20
//         }
//     },
//     xaxis: {
//         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
//         labels: {
//             style: {
//                 fontSize: '13px',
//                 colors: axisColor
//             }
//         },
//         axisTicks: {
//             show: false
//         },
//         axisBorder: {
//             show: false
//         }
//     },
//     yaxis: {
//         labels: {
//             style: {
//                 fontSize: '13px',
//                 colors: axisColor
//             }
//         }
//     },
//     responsive: [{
//             breakpoint: 1700,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '32%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 1580,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '35%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 1440,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '42%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 1300,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '48%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 1200,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '40%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 1040,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 11,
//                         columnWidth: '48%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 991,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '30%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 840,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '35%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 768,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '28%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 640,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '32%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 576,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '37%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 480,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '45%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 420,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '52%'
//                     }
//                 }
//             }
//         },
//         {
//             breakpoint: 380,
//             options: {
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 10,
//                         columnWidth: '60%'
//                     }
//                 }
//             }
//         }
//     ],
//     states: {
//         hover: {
//             filter: {
//                 type: 'none'
//             }
//         },
//         active: {
//             filter: {
//                 type: 'none'
//             }
//         }
//     }
// };
 totalRevenueChartOptions = {
    series: data_pillar,
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    title: {
      text: 'Month'
    }
  },
  yaxis: {
    title: {
      text: 'RM'
    },
  },

  };

if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
}
const totalRevenueChartEl_inccrease = document.querySelector('#sales_funnel_increase'),
totalRevenueChartOptions_inrease = {
    series: data_pillar_increase,
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    title: {
      text: 'Month'
    }
  },
  yaxis: {
    title: {
      text: 'RM'
    },
  },

  };

if (typeof totalRevenueChartEl_inccrease !== undefined && totalRevenueChartEl_inccrease !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl_inccrease, totalRevenueChartOptions_inrease);
    totalRevenueChart.render();
}




$('#status_month').on('change', function() {
    urlDashboard();
});

$('#status_year').on('change', function() {
    urlDashboard();
});

$('#stock_in_month').on('change', function() {
  urlDashboard();
});

$('#stock_in_year').on('change', function() {
  urlDashboard();
});

$('#stock_in_month_customer').on('change', function() {
  urlDashboard();
});

$('#stock_in_year_customer').on('change', function() {
  urlDashboard();
});

$('#stock_out_month_customer').on('change', function() {
  urlDashboard();
});

$('#stock_out_year_customer').on('change', function() {
  urlDashboard();
});

$('#stock_return_month').on('change', function() {
  urlDashboard();
});

$('#stock_return_year').on('change', function() {
  urlDashboard();
});

$('#demand_more_product').on('change', function() {
  urlDashboard();
});

$('#kpi_month').on('change', function() {
  urlDashboard();
});

$('#kpi_year').on('change', function() {
  urlDashboard();
});

$('#kpi_team_month').on('change', function() {
  urlDashboard();
});

$('#kpi_team_year').on('change', function() {
  urlDashboard();
});
$('#kpi_sales_person').on('change', function() {
  urlDashboard();
});

$('#category_month').on('change', function() {
  urlDashboard();
});

$('#category_year').on('change', function() {
  urlDashboard();
});

$('#category_category').on('change', function() {
  urlDashboard();
});





function urlDashboard(){

  var url = '../dashboard?';

  var status_month = $('#status_month').val();
  var status_year = $('#status_year').val();
  var stock_in_month = $('#stock_in_month').val();
  var stock_in_year = $('#stock_in_year').val();
  var stock_in_month_customer = $('#stock_in_month_customer').val();
  var stock_in_year_customer = $('#stock_in_year_customer').val();
  var stock_out_month_customer = $('#stock_out_month_customer').val();
  var stock_out_year_customer = $('#stock_out_year_customer').val();
  var stock_return_month = $('#stock_return_month').val();
  var stock_return_year = $('#stock_return_year').val();
  var demand_more_product = $('#demand_more_product').val();
  var kpi_month = $('#kpi_month').val();
  var kpi_year = $('#kpi_year').val();
  var kpi_team_month = $('#kpi_team_month').val();
  var kpi_team_year = $('#kpi_team_year').val();
  var kpi_sales_person = $('#kpi_sales_person').val();
  var category_category = $('#category_category').val();
  var category_year = $('#category_year').val();
  var category_month = $('#category_month').val();


  if(status_month) url += 'status_month='+status_month+'&';

  if(status_year) url += 'status_year='+status_year+'&';

  if(stock_in_month) url += 'stock_in_month='+stock_in_month+'&';

  if(stock_in_year) url += 'stock_in_year='+stock_in_year+'&';

  if(stock_return_month) url += 'stock_return_month='+stock_return_month+'&';

  if(stock_return_year) url += 'stock_return_year='+stock_return_year+'&';

  if(stock_in_month_customer) url += 'stock_in_month_customer='+stock_in_month_customer+'&';
  if(stock_in_year_customer) url += 'stock_in_year_customer='+stock_in_year_customer+'&';

  if(stock_out_month_customer) url += 'stock_out_month_customer='+stock_out_month_customer+'&';
  if(stock_out_year_customer) url += 'stock_out_year_customer='+stock_out_year_customer+'&';

  if(demand_more_product) url += 'demand_more_product='+demand_more_product+'&';

  if(kpi_month) url += 'kpi_month='+kpi_month+'&';

  if(kpi_year) url += 'kpi_year='+kpi_year+'&';

  if(kpi_team_month) url += 'kpi_team_month='+kpi_team_month+'&';

  if(kpi_team_year) url += 'kpi_team_year='+kpi_team_year+'&';

  if(kpi_sales_person) url += 'kpi_sales_person='+kpi_sales_person+'&';

  if(category_category) url += 'category_category='+category_category+'&';

  if(category_year) url += 'category_year='+category_year+'&';

  if(category_month) url += 'category_month='+category_month+'&';


  window.location.href = url;
}