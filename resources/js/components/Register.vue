<template>
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Register</h1>
    <form @submit.prevent="register">
      <div class="mb-4">
        <label for="name" class="block mb-2">Name:</label>
        <input
          type="text"
          id="name"
          v-model="name"
          class="w-full px-4 py-2 border border-gray-300 rounded"
        />
      </div>
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
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
    };
  },
  methods: {
    register() {
      // Implement your registration logic here, e.g., make an API call to your Laravel backend
      // using the registration form fields.
      // You can use axios or another HTTP library to make the API call.
    },
  },
};
</script>
