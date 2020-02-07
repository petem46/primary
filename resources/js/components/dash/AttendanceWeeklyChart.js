import ChartDataLabels from 'chartjs-plugin-datalabels';
import ChartAnnotation from 'chartjs-plugin-annotation';
import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
  plugins: [ChartDataLabels, ChartAnnotation],
  props: {
    chartdata: {
      type: Array | Object,
      default: null
    },
    options: {
      type: Object,
      default: null
    }
  },
  annotation: {
    annotations: [{
      drawTime: "afterDatasetsDraw",
      // id: "hline",
      type: "line",
      mode: "horizontal",
      scaleID: "y-axis-0",
      value: 95,
      borderColor: "red",
      borderWidth: 2,
      borderDash: [10, 10],
      label: {
        backgroundColor: "white",
        content: "Nat",
        enabled: false,
      },
    }],
  },
  mounted() {
    this.renderChart(this.chartdata, this.options)
  }
}
