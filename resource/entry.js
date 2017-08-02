import Vue from 'vue'
import axios from 'axios'

import './style/style.scss'

Vue.use(axios)

new Vue({
  el: '#app',
  components: {
    'example': require('./script/components/example.vue'),
  }
})

