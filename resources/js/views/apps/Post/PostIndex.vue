<template>
    <div>
        
        <p>{{ formattedDate }}</p>

        <form @submit.prevent="store">
            <label for="">Title</label>
            <input type="text" v-model="form.title">
            <label for="">Content</label>
            <input type="text" v-model="form.content">
            <button>SAVE</button>
        </form>

        <h2>POSTS</h2>
        <template v-if="posts.length <= 0">
                No Posts Yet ...
        </template>
        <template v-else>
                
            <div v-for="post in posts" :key="post.id" class="post space-y-2">
                <p class="fw-bold">Title: {{ post.title  }}</p>
                <p>Content: {{ post.content  }}</p>
                <p>Published At: {{ formatDate(parseDate(post.created_at),'M/D/YYYY') }}</p>
                <router-link :to="{name:'post-details', params:{ id:post.id }}" style="background-color: blue; color:#fff">View</router-link>
            </div>
        </template>
    </div>
</template>

<script setup>
import { reactive, ref, onBeforeMount } from 'vue';
import { useDateFormat, formatDate } from '@vueuse/core'
import axios from 'axios';

const formattedDate = useDateFormat(new Date,'M/D/YYYY');
const form = reactive({
    title:null,
    content:null
})

const posts = ref([]);

let user_id = ref(null);

const parseDate = (dateString) => {
      // Convert the dateString to a Date object
      return new Date(dateString);
    }

// const formatDateFunc = (date, formatString) => {
//       const { value } = useDateFormat(date, formatString);
//       return value;
//  }

const randUser = function() {
    let randUserId = Number.parseInt((Math.random() * 10) + 1);
   user_id.value = randUserId;
   return user_id.value;
}

const getPosts = async () =>{
    await axios.get('/api/post').then(response=>{
        posts.value = response.data.posts;
    }).catch(error=>{
        console.log(error);
    });
}

const store = () =>{
    axios.post('/api/post',{form_data:form,'user_id':randUser() });
}

onBeforeMount(async () => {
    await getPosts();
})

</script>

<style scoped>

</style>