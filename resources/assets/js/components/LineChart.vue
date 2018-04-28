<template>
    <canvas :height="height" :width="width" class="d-inline"></canvas>
</template>

<script>
import Chart from "chart.js";

export default {
  props: {
    url: "",
    colours: {
      type: Array,
      default: function() {
        return [
          "#c81c70",
          "#0091D3",
          "#6B5AA9",
          "#FFCC66",
          "#009966",
          "#ff9830",
          "#F69D9D",
          "#b2ebff",
          "#96DE99",
          "#333333"
        ];
      }
    },
    width: {
      default: 1000
    },
    height: {
      default: 500
    },
    title: {
      default: ""
    },
    xLabel: "",
    yLabel: "",
    yAxisMax: {
      default: 0
    }
  },
  mounted: function() {
    var self = this;
    $.get(this.url).then(function(response) {
      var options = {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
                suggestedMax: self.yAxisMax
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

      Chart.defaults.global.defaultFontFamily = "Tahoma";
      Chart.defaults.global.responsive = false;
      if (self.title.length != 0) {
        Chart.defaults.global.title.display = true;
        Chart.defaults.global.title.text = self.title;
      }

      var data = {
        labels: Object.keys(response[getFirstKey(response)]),
        datasets: []
      };

      var count = 0;
      $.each(response, function(index, value) {
        data.datasets.push({
          label: index,
          backgroundColor: self.colours[count],
          borderColor: self.colours[count],
          pointBackgroundColor: self.colours[count],
          borderWidth: 2,
          pointRadius: 2,
          fill: false,
          data: Object.keys(value).map(function(key) {
            return value[key];
          })
        });
        count++;
      });

      new Chart(self.$el.getContext("2d"), {
        type: "line",
        data: data,
        options: options
      });
    });
  }
};

function getFirstKey(response) {
  for (var first in response) break;

  return first;
}
</script>

