var calculator = new Vue({
  el      : '#calculator',
  data    : {
    loan  : 35000,
    length: 35
  },
  methods : {
    range: function (min, max, step) {
      var array = [],
        j = 0;
      for (var i = min; i <= max; i = i + step) {
        array[j] = i;
        j++;
      }
      return array;
    }
  },
  computed: {
    calcPayment: function (e) {
      return this.loan + this.loan * this.length * 0.00135 || 0;
    },
    calcDate   : function (e) {
      return moment().locale('ru').add(this.length, 'd').format('Do MMMM YYYY')
    },
    loans      : function () {
      return this.range(1000, 35000, 1000)
    },
    dates      : function () {
      return this.range(5, 35, 1)
    }
  }
});