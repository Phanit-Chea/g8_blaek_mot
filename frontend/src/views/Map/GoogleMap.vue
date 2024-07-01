<template>
    <div ref="map" style="width: 100%; height: 500px;"></div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const map = ref(null);

onMounted(() => {
    if (window.google && window.google.maps) {
        new window.google.maps.Map(map.value, {
            center: { lat: 11.5564, lng: 104.9282 }, // Phnom Penh, Cambodia
            zoom: 10
        });
    } else {
        console.error('Google Maps library is not loaded.');
    }
});
</script>
