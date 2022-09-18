import {createApp} from 'vue/dist/vue.esm-bundler.js'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

const app = createApp({})
app.component('ticket-index', TicketIndex);

import TicketIndex from './components/ticket/index.vue'

app.mount('#app')
