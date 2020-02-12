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
  mounted() {
    this.renderChart(this.chartdata, this.options)
  }
}
