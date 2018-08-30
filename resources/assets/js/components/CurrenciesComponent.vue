<template>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Название валюты</th>
                            <th>Цена</th>
                            <th>Количество</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for='item in stock'>
                            <td>{{item.name}}</td>
                            <td>{{ parseInt(item.volume) }}</td>
                            <td>{{ item.price.amount.toFixed(2) }}</td>

                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="col-md-2">
                <button @click="update" class="btn btn-primary" v-if="!is_refresh">Обновить</button>
                <span class="badge badge-primary" v-if="is_refresh">Обновление ...</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                stock: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            this.update()
            setInterval(this.update, 15000);
        },

        methods: {
            update: function () {
                this.is_refresh = true
                axios.get('/currencies').then((response) => {
                    console.log(response);
                    this.stock = response.data.stock
                    this.is_refresh = false
                    this.id++
                });
            }
        }
    }
</script>
