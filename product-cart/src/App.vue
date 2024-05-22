<template>
  <header class="top-bar spread">
    <nav class="top-bar-nav">
      <router-link to="/" class="top-bar-link">
        <i class="icofont-spoon-and-fork"></i>
        <span>Home</span>
      </router-link>
      <router-link to="/products" class="top-bar-link">
        <span>Products</span>
      </router-link>
      <router-link to="/past-orders" class="top-bar-link">
        <span>Past Orders</span>
      </router-link>
    </nav>
    <div class="top-bar-cart-link" @click="toggleSidebar">
        <i class="icofont-cart-alt icofont-1x"></i>
        <span>Cart ({{ totalQuantity }})</span>
    </div>
  </header>
  <router-view @click="hideSidebar" :inventory="inventory" :addToCart="addToCart"></router-view>
  <SideBar v-if="showSidebar" :toggle="toggleSidebar" :cart="cart" :inventory="inventory" :remove="removeItem"/>
</template>
<script>
import SideBar from '@/components/SideBar.vue'
export default {
  components: {
    SideBar
  },
  data() {
    return {
      showSidebar: false,
      inventory: [],
      cart: {},
    }
  },
  methods: {
    addToCart(name, index) {
      if (!this.cart[name]) this.cart[name] = 0
      this.cart[name] += this.inventory[index].quantity
      this.inventory[index].quantity = 0
    },
    toggleSidebar() {
      this.showSidebar = !this.showSidebar
    },
    hideSidebar() {
      this.showSidebar = false
    },
    removeItem(name) {
      delete this.cart[name]
    }
  },
  computed: {
    totalQuantity() {
      return Object.values(this.cart).reduce((acc, curr) => {
        return acc + curr
      }, 0).toFixed(2)
    }
  },

async mounted(){

    const res = await fetch("http://localhost:8000/api/products")
    const data = await res.json()
    this.inventory = data
  }
}
</script>
