<template>
    <div class="container">
        <h1 class="my-4">PostCards</h1>
        <form class="my-4">
            <label for="sender">Sender</label>
            <input type="text" name="sender"><br>
            <label for="address">Address</label>
            <input type="text" name="address"><br>
            <label for="text">Text</label>
            <input type="text" name="text"><br>
            <label for="image">Image</label>
            <input type="file" name="image"><br>
            <input type="button" value="Send">
        </form>
        <div v-for="(postCard, i) in allPostCards" class="my-4">
            <div>Sender: {{ postCard.sender }}</div>
            <div>Address: {{ postCard.address }}</div>
            <div>Text: {{ postCard.text }}</div>
            <div>Img: {{ postCard.image }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                allPostCards: []
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
            }
        }
    }
</script>
