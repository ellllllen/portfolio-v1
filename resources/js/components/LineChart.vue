<template>
    <canvas :height="height" :width="width" class="d-inline"></canvas>
</template>

<script>
import Chart from "../../../node_modules/chart.js/src/chart";

export default {
  props: {
    url: "",
    xLabel: "",
    yLabel: "",
    width: {
      default: 1000
    },
    height: {
      default: 500
    }
  },
  mounted: function() {
    var self = this;
    var ctx = self.$el.getContext("2d");

    $.get(this.url).then(function(response) {
      //global defaults
      var chartDefault = Chart.defaults.global;
      chartDefault.defaultFontFamily = "Lato";
      chartDefault.defaultFontColor = "#333333";
      chartDefault.defaultFontSize = 14;

      //chart data
      var data = {
        labels: Object.keys(response[getSecondaryKey(response)]),
        datasets: []
      };

      var colour = "";
      $.each(response, function(key, value) {
        colour = getRandomColor();
        data.datasets.push({
          label: key,
          fill: false,
          backgroundColor: colour,
          borderColor: colour,
          data: Object.keys(value).map(function(key) {
            return value[key];
          })
        });
      });

      //chart options
      var options = {
        scales: {
          yAxes: [
            {
              gridLines: {
                display: false
              },
              ticks: {
                beginAtZero: true
              },
              scaleLabel: {
                display: true,
                labelString: self.xLabel
              }
            }
          ],
          xAxes: [
            {
              gridLines: {
                display: false
              },
              scaleLabel: {
                display: true,
                labelString: self.yLabel
              }
            }
          ]
        }
      };

      //render chart
      new Chart(ctx, {
        type: "line",
        data: data,
        options: options
      });
    });
  }
};

function getSecondaryKey(response) {
  for (var first in response) break;

  return first;
}

function getRandomColor() {
  return (
    "#" +
    Math.random()
      .toString(16)
      .slice(-6)
  );
}
</script>

