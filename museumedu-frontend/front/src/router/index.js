import { createRouter, createWebHistory } from 'vue-router'
import ThemeSelect from '../components/ThemeSelect.vue'
import ItemList from '../components/ItemList.vue'
import AdminForm from '../components/AdminForm.vue'

const routes = [
  { path: '/', component: ThemeSelect },
  { path: '/tema/:theme', component: ItemList },
  { path: '/admin', component: AdminForm }
]


export default createRouter({
  history: createWebHistory(),
  routes
})