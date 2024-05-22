<template>
  <main class="wrapper">
    <h1>Past Orders</h1>
    <div class="main-container" v-for="(order, i) in this.pastOrdersList" key="i">
      <h3>Order Number {{ order.order_id }}</h3>
      <table class="product-list-container" v-for="(product) in order.order_items">
        <thead>
          <tr class="table-container">
            <td><strong>Image</strong></td>
            <td><strong>Product</strong></td>
            <td><strong>Price</strong></td>
            <td><strong>Quantity</strong></td>
            <td><strong>Total</strong></td>
            <td><strong>Actions</strong></td>
          </tr>
        </thead>
        <tbody >
          <tr class="table-container">
            <td><i class="icofont-4x icofont-sausage mb"></i></td>
            
            <td>{{ product.product_name}} </td>
            <td>{{ product.product_price}} </td>
            <td>{{ product.product_quantity}}</td>
            <td>{{ product.product_total}}</td>
            <td><button class="btn btn-dark">Add</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script>
export default {
  name: "PastOrders",
  data() {
    return {
      pastOrdersList: [],
    };
  },

  async mounted() {
    const response = await fetch("http://localhost:8000/api/previousorders");
    const data = await response.json();
    this.pastOrdersList = data;
  },
};
</script>

<style scoped>
.product-list-container{
  margin-top: 1rem;
  
}

.table-container{
  display:flex;
  justify-content: space-evenly;
  margin-top:2rem;
  align-items:center;
}

td{
  flex:1;
}

.main-container{
  display:flex;
  flex-direction:column;
  margin-top: 2rem;
  margin-bottom:5rem;
}



</style>
