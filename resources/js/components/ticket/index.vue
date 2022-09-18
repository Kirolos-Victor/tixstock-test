<template>
    <div class="container" style="border: 1px solid gray; border-radius: 10px; margin-top: 100px;">
        <div class="row mt-3 mb-5">
            <div class="col-6">
                <h3>Tickets</h3>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" placeholder="search"
                       v-model="searchValue"
                       @input="filterNames();">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Event Name</th>
                <th scope="col">Currency</th>
                <th scope="col">Quantity Initial</th>
                <th scope="col">Quantity Available</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(ticket,index) in tickets">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ ticket.event_name }}</td>
                <td>{{ ticket.currency }}</td>
                <td>{{ ticket.quantity_initial }}</td>
                <td>{{ ticket.quantity_available }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

import {ref} from "vue";
import axios from 'axios'

export default {
    name: "index",
    props: ['tickets'],
    setup(props) {
        const tickets = ref(props.tickets);
        const searchValue = ref();

        function filterNames() {
            axios.get('/tickets/search?q=' + searchValue.value).then((data) => {
                tickets.value = data.data;
            })
        }

        return {tickets, searchValue, filterNames};
    }
}
</script>

<style scoped>

</style>
