var BarsChart = (function() {

    //
    // Variables
    //

    var $chart = $('#chart-bulan');


    //
    // Methods
    //

    // Init chart
    function initChart($chart) {
      $.get({
        url: 'statistik/getpencairanbulan',
        success: function(e){
          var month;
          var value;
          month = e.map((e)=>{
            return e.month;
          })
          value = e.map((e)=>{
            return parseInt(e.value,10);
          });
          var ordersChart = new Chart($chart, {
            type: 'bar',
            data: {
              labels: month,
              datasets: [{
                label: 'Rupiah',
                data: value
              }]
            },
            options: {
              tooltips: {
                  callbacks: {
                      label: function(tooltipItem, data) {
                          return tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                      }
                  }
              }
            }
          });
        }
      });
      // Create chart
      

      // Save to jQuery object
      $chart.data('chart', ordersChart);
    }


    // Init chart
    if ($chart.length) {
      initChart($chart);
    }

    })();