<template>
  <div class="container py-5">
    <h1 class="text-center retro-title mb-4">Válassz témát</h1>
    <div class="row g-4">
      <div class="col-md-3" v-for="theme in themes" :key="theme.name">
        <div class="card h-100 retro-card shadow" @click="goToTheme(theme.name)" style="cursor: pointer;">
          <img :src="theme.image" class="card-img-top" :alt="theme.name">
          <div class="card-body text-center">
            <h5 class="card-title">{{ theme.name }}</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const themes = [
  {
    name: 'Technika',
    image: 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Radio_receiver_restored.jpg'
  },
  {
    name: 'Iskola',
    image: 'https://upload.wikimedia.org/wikipedia/commons/0/0e/Schoolbag_bag.jpg'
  },
  {
    name: 'Háztartás',
    image: 'https://upload.wikimedia.org/wikipedia/commons/a/a2/Blender_with_glass_container.jpg'
  },
  {
    name: 'Zene',
    image: 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Vintage_turntable.jpg'
  }
]

function goToTheme(theme) {
  router.push(`/tema/${theme}`)
}
</script>

<style scoped>
.retro-title {
  font-family: 'Shrikhand', cursive;
  font-size: 2.5rem;
  color: #6c1e1e;
}

.retro-card {
  border: 2px solid #e3dccc;
  border-radius: 16px;
}

.card-img-top {
  object-fit: cover;
  height: 180px;
}
</style>
