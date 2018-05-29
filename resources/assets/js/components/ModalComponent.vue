<template>
<div tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{ body }}</p>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: ["body"],
  data() {
    return {
      showModal: false
    };
  }
};
</script>

