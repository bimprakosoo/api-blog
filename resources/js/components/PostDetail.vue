<template>
  <div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <router-link :to="{ name: 'post' }" class="text-blue-600 hover:text-blue-800 mb-4">&lt; Back</router-link>
      <h2 class="text-xl font-bold mb-2">{{ post.title }}</h2>
      <p class="text-gray-700">{{ post.content }}</p>
      <p class="text-gray-600">Category: {{ post.category.name }}</p>
      <p class="text-gray-600">Tags:
        <span v-for="tag in post.tags" :key="tag.id" class="bg-gray-200 text-gray-700 py-1 px-2 rounded-full inline-block text-sm mr-2">{{ tag.name }}</span>
      </p>

      <hr class="my-4">

      <h3 class="text-lg font-bold mb-2">Comments</h3>
      <div class="mt-4">
        <!-- Comment Form - Display only if user is authenticated -->
        <form v-if="isAuthenticated" @submit.prevent="submitComment">
          <input type="hidden" name="post_id" :value="post.id">
          <textarea v-model="commentContent" class="w-full bg-gray-100 rounded-lg p-2" placeholder="Write a comment"></textarea>
          <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 mt-2">Submit</button>
        </form>
        <p v-else class="text-gray-600">You must be logged in to submit a comment.</p>
      </div>
      <hr class="my-4">
      <h3 class="text-lg font-bold mb-2">Existing Comments</h3>
      <div class="mt-4">
        <!-- Display Existing Comments -->
        <div v-for="comment in post.comments" :key="comment.id" class="bg-gray-100 rounded-lg p-4 mb-2">
          <p class="text-gray-700">{{ comment.content }}</p>
          <p class="text-gray-600">By: Anonymous</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: null,
      commentContent: '',
    };
  },
  computed: {
    isAuthenticated() {
      // Add your authentication logic here
      // Return true if the user is authenticated, false otherwise
      // You can use Vuex store or any other authentication mechanism
      // For simplicity, we assume the user is authenticated
      return true;
    },
  },
  mounted() {
    this.fetchPost();
  },
  methods: {
    fetchPost() {
      const postId = this.$route.params.id;

      // Make an API request to fetch the post by ID
      // Adjust the API endpoint URL according to your Laravel API routes
      axios.get(`/api/post/${postId}`)
        .then(response => {
          this.post = response.data[0];
        })
        .catch(error => {
          console.log('An error occurred:', error.message);
        });
    },
    submitComment() {
      // Handle comment submission logic here
      // You can make an API request to submit the comment
      // Adjust the API endpoint URL and request payload according to your Laravel API routes and requirements
      const commentData = {
        post_id: this.post.id,
        content: this.commentContent,
      };

      axios.post('/api/post/comment', commentData)
        .then(response => {
          // Comment submitted successfully, update the comments list or show a success message
          console.log('Comment submitted:', response.data);
          // Reset the comment content
          this.commentContent = '';
        })
        .catch(error => {
          console.log('An error occurred while submitting the comment:', error.message);
        });
    },
  },
};
</script>
