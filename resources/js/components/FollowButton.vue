<template>
    <div>
        <button class="btn btn-primary" style="margin-left: 30px" @click="followUser">Follow</button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },


        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        console.log(response.data);
                    });
            }
        }
    }
</script>
