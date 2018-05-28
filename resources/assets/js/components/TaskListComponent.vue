<template>
    <ul>
      <task v-for="task in tasks">{{ task.description }}</task>
    </ul>
</template>

<script>
export default {
  data() {
    return {
      tasks: [
        { description: "Do washing up", completed: false },
        { description: "Clear inbox", completed: false },
        { description: "Make dinner", completed: false },
        { description: "Cut the grass", completed: false },
        { description: "Clean room", completed: false }
      ]
    };
  }
};
</script>
