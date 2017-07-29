import Vue from 'vue'
import './style/style.scss'

new Vue({
  el: '#app',
  components: {
    'example': require('./script/components/example.vue'),
  }
})
