<template>
    <div>
        <div v-show="isVisible">
            <h5>{{ title }}</h5>
            <p>{{ body }}</p>
        </div>
        <a class="btn btn-primary" @click="isVisible = !isVisible" role="button">Toggle</a>
    </div>
</template>

<script>
export default {
  props: ["title", "body"],
  data() {
    return {
      isVisible: true
    };
  }
};
</script>

