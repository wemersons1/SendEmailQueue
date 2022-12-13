<script>
import Modal from './Modal.vue';

export default {
    name: "Title",
    components: { Modal }
}

</script>

<template>

<div class="d-flex justify-content-between my-4" type="button" data-bs-toggle="modal" aria-label="Close">
    <h1 class="h2">Disparos</h1>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Criar novo disparo
    </button>
</div>
  
<Modal/>

</template>
