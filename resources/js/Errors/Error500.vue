<template>
    <div class="error-page">
      <h1>Error 500 - Error interno del servidor</h1>
      <p>Lo sentimos, ha ocurrido un error interno del servidor. Por favor, inténtelo de nuevo más tarde.</p>
      <p>Puede ponerse en contacto con el soporte técnico si el problema persiste.</p>
      <router-link :to="{ name: 'dashboard' }">Volver a la página de inicio</router-link>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Error500',
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