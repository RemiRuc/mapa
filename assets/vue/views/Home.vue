<template>
  <div>
    <h1>{{map.name}}</h1>
    <Map v-if="!isLoading && error == null" :pins="map.pins" />
  </div>
</template>

<script>
import Map from '../components/Map'
export default {
  name: "Home",
  components: {Map},
  created() {
    this.$store.dispatch('map/findOne', 3)
  },
  computed: {
    map() {
      return this.$store.getters['map/map']
    },
    isLoading() {
      return this.$store.getters['map/isLoading']
    },
    error() {
      return this.$store.getters['map/error']
    }
  }
};
</script>