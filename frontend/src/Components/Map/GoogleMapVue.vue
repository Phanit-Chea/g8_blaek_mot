<template>
  <div id="map"></div>
</template>

<script>
import { onMounted } from 'vue';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

export default {
  name: 'MapView',
  setup() {
    onMounted(() => {
      const cambodiaBounds = L.latLngBounds(
        [10.486543687375556, 102.34809563797801],
        [14.704581152503045, 107.62768729271226]
      );

      const map = L.map('map', {
        center: [12.5657, 104.991],
        zoom: 7,
        maxBounds: cambodiaBounds,
        maxBoundsViscosity: 1.0
      });

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([11.5564, 104.9282]).addTo(map)
        .bindPopup('Phnom Penh, Cambodia')
        .openPopup();
    });
  }
};
</script>

<style scoped>
#map {
  width: 100%;
  height: 50vh;
}
</style>
