<template>
    <div id="map"></div>
</template>

<script>
export default {
    name: 'Map',
    data() {
        return {
            map: null
        }
    },
    mounted() {
        this.map = L.map('map').setView([51.505, -0.09], 2);
        L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 1,
            maxZoom: 16,
            ext: 'jpg'
        }).addTo(this.map);
    }
}
</script>

<style lang="scss" scoped>
    #map {
        height: 100vh;
    }
</style>