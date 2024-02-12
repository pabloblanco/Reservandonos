<template>
    <div class="error-page">
      <h1>Error 404 - Recurso no encontrado</h1>
      <p>Lo sentimos, la página que está buscando no existe o no tiene la información completa. Por favor, verifique la URL e inténtelo de nuevo.</p>
      <router-link :to="{ name: 'dashboard' }">Volver a la página de inicio</router-link>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Error404',
  };
  </script>
  
  <style scoped>
  .error-page {
    text-align: center;
    padding: 20px;
  }
  
  .error-page h1 {
    font-size: 2em;
    color: #ff0000; /* Color rojo para indicar un error */
  }
  
  .error-page p {
    margin: 10px 0;
  }
  </style>