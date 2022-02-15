<template>
    <div class="container">
        <h1 class="my-4">PostCards</h1>
        <form class="my-4">
            <label for="sender">Sender</label>
            <input type="text" name="sender" v-model="sender"><br>
            <label for="address">Address</label>
            <input type="text" name="address" v-model="address"><br>
            <label for="text">Text</label>
            <input type="text" name="text" v-model="text"><br>
            <label for="image">Image</label>
            <input type="file" name="image" @change="uploadFile()" ref="file"><br>
            <input type="button" value="Send" @click="sendData()">
        </form>
        <div v-for="(postCard, i) in allPostCards" class="my-4">
            <div>Sender: {{ postCard.sender }}</div>
            <div>Address: {{ postCard.address }}</div>
            <div>Text: {{ postCard.text }}</div>
            <div v-if="postCard.image">Img: <img :src="'/storage/img/' + postCard.image" alt=""></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                allPostCards: [],
                sender: '',
                address: '',
                text: '',
                image: ''
            }
        },
        mounted() {
            this.getAllPostCards();
        },
        methods: {
            getAllPostCards: async function() {
                try {

                    let response = await fetch('http://localhost:8000/api/postcards');

                    if (response.ok) {
                        let responseToJson = await response.json();

                        this.allPostCards = responseToJson.data;
                    }

                } catch(err) {
                    console.log(err);
                }
            },
            sendData: async function() {
                try {

                    let data = new FormData();
                    
                    data.append('sender', this.sender);
                    data.append('address', this.address);
                    data.append('text', this.text);
                    data.append('image', this.image);

                    let response = await fetch('http://localhost:8000/api/postcards/store', {
                        method: 'POST',
                        body: data
                    });

                    if (response.ok) {
                        let responseToJson = await response.json();

                        this.allPostCards.push(responseToJson.data);
                    }

                } catch(err) {
                    console.log(err);
                }
            },
            uploadFile() {
                this.image = this.$refs.file.files[0];
                console.log(this.image);
            }
        }
    }
</script>
