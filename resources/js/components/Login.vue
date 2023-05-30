<template>
  <div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Login</h1>
      <form @submit.prevent="login" class="max-w-sm">
        <div class="mb-4">
          <label for="email" class="block mb-2">Email:</label>
          <input
            type="email"
            id="email"
            v-model="email"
            class="w-full px-4 py-2 border border-gray-300 rounded"
          />
        </div>
        <div class="mb-4">
          <label for="password" class="block mb-2">Password:</label>
          <input
            type="password"
            id="password"
            v-model="password"
            class="w-full px-4 py-2 border border-gray-300 rounded"
          />
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    login() {
      const credentials = {
        email: this.email,
        password: this.password,
      };

      axios.post('/api/login', credentials)
        .then(response => {
          // Successful login
          const {token, user} = response.data;
          // Save the token and user details in local storage or a Vuex store for future use
          // Redirect the user to another page or perform other necessary actions
        })
        .catch(error => {
          // Login failed
          if (error.response.status === 401) {
            // Invalid credentials
            console.log('Invalid credentials');
          } else {
            // Other errors
            console.log('An error occurred:', error.message);
          }
        });
    },
  },
};
</script>
