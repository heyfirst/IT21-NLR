<template>
  <button
    class="seat btn btn-block"
    v-bind:class="[isowner ? 'btn-success my-booking' : [ username ? 'btn-danger': 'btn-default free']]"
    v-bind="{ 'data-seat':seat }" >
    <div v-if="username">
      {{ username }}
    </div>
    <div v-else>
      ว่าง
    </div>
  </button>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.')
        },
        props: ['username','isowner','seat'],

    }
</script>
