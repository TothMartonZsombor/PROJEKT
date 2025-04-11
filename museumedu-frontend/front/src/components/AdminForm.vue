<template>
  <div class="container mt-5">
    <h2 class="mb-4">Új tárgy feltöltése</h2>
    <form @submit.prevent="submitForm">
      <div class="mb-3">
        <label class="form-label">Név</label>
        <input v-model="form.name" type="text" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Téma</label>
        <select v-model="form.theme" class="form-select" required>
          <option disabled value="">Válassz témát</option>
          <option>Technika</option>
          <option>Iskola</option>
          <option>Zene</option>
          <option>Háztartás</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Év</label>
        <input v-model="form.year" type="number" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Történet</label>
        <textarea v-model="form.story" class="form-control" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Kép</label>
        <input type="file" @change="handleImageUpload" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Feltöltés</button>
      <p class="mt-3" v-if="message">{{ message }}</p>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const form = ref({
  name: '',
  theme: '',
  year: '',
  story: '',
  image: null,
  category_id: 1 // dummy érték, hogy backend validáción átmenjen, de már nem lesz használva
})

const message = ref('')

function handleImageUpload(event) {
  form.value.image = event.target.files[0]
}

async function submitForm() {
  const formData = new FormData()
  for (const key in form.value) {
    formData.append(key, form.value[key])
  }

  try {
    await axios.post('http://localhost:8000/api/items', formData)
    message.value = '✅ Sikeres feltöltés'
  } catch (error) {
    console.error(error)
    message.value = '❌ Hiba történt a feltöltés során'
  }
}
</script>
