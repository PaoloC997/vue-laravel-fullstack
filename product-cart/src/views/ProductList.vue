<template>
   <main class="wrapper">
        <h1>Products</h1>
        <div class="card-container">
          <div class="card" v-for="(product, i) in inventory" :key="product.id">
            <div class="card-title">
              {{product.name}}
            </div>
            <div class="card-body">
              <i class="icofont-10x icofont-{{product.name.toLowerCase().slice(0,-1)}}"></i>
              <form>
                <div class="row">
                  <div class="cell">
                    <label>Type:</label>
                  </div>
                  <div class="cell">
                    <em>{{ product.type }}</em>
                  </div>
                </div>
                <div class="row">
                  <div class="cell">
                    <label>Price:</label>
                  </div>
                  <div class="cell">
                   {{product.price_usd}}
                  </div>
                </div>
                <div class="row">
                  <div class="cell">
                    <label>Quantity:</label>
                  </div>
                  <div class="cell">
                    <input type="number" value="0" v-model.number="product.quantity">
                  </div>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <button @click="addToCart(product.name, i)"  class="btn btn-light">Add to cart</button>
            </div>
          </div>
        </div>
      </main>
</template>
<script>

export default {
  props: ['inventory', 'addToCart'],
  name: 'ProductList',

}
</script>
