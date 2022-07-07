<template>
  <div>
    <h2>This is the Vue App</h2>
    <GuestPage />
  </div>
</template>

<script>
import GuestPage from "../components/GuestPage.vue";

export default {
  name: "app",
  components: {
    GuestPage,
  },
};
</script>

<style>
</style>