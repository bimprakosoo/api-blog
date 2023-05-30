<template>
  <div class="container mx-auto py-8">
    <div class="flex flex-wrap -mx-4">
      <div class="w-3/4 px-4">
        <h1 class="text-3xl font-bold mb-4">All Posts</h1>
        <div class="grid grid-cols-1 gap-4">
          <div v-for="post in posts" :key="post.id" class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-2">{{ post.title }}</h2>
            <p class="text-gray-700">{{ truncateContent(post.content) }}...</p>
            <p class="text-gray-600">Category: {{ post.category ? post.category.name : 'N/A' }}</p>
            <p class="text-gray-600">Tags:
              <span v-for="tag in post.tags" :key="tag.id"
                    class="bg-gray-200 text-gray-700 py-1 px-2 rounded-full inline-block text-sm mr-2">{{ tag.name }}</span>
            </p>
            <a :href="getPostLink(post.id)" class="text-blue-600 hover:text-blue-800">Read More</a>
          </div>
        </div>
      </div>
      <div class="w-1/4 px-4">
        <h2 class="text-2xl font-bold mb-4">Newest Posts</h2>
        <div class="grid grid-cols-1 gap-4">
          <div v-for="newPost in newestPosts" :key="newPost.id" class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-bold mb-2">{{ newPost.title }}</h3>
            <p class="text-gray-700">{{ truncateContent(newPost.content) }}...</p>
            <p class="text-gray-600">Category: {{ newPost.category ? newPost.category.name : 'N/A' }}</p>
            <p class="text-gray-600">Tags:
              <span v-for="tag in newPost.tags" :key="tag.id"
                    class="bg-gray-200 text-gray-700 py-1 px-2 rounded-full inline-block text-sm mr-2">{{ tag.name }}</span>
            </p>
            <a :href="getPostLink(newPost.id)" class="text-blue-600 hover:text-blue-800">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: [],
      newestPosts: [],
    };
  },
  mounted() {
    this.fetchPosts();
  },
  methods: {
    fetchPosts() {
      axios.get('/api/post')
        .then(response => {
          this.posts = response.data;
          this.newestPosts = this.posts.slice(0, 3);
        })
        .catch(error => {
          console.log('An error occurred:', error.message);
        });
    },
    truncateContent(content) {
      if (content.length > 100) {
        return content.slice(0, 100);
      }
      return content;
    },
    getPostLink(id) {
      return `/post/${id}`;
    },
  },
};
</script>