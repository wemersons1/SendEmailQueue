<script>

export default {
    name: 'Card',
    props: ['title', 'sender', 'status', 'updated_at']
}

</script>

<template>

    <div class="card text-bg-light mb-3 py-2 bg-white" style="max-width: 18rem;">
        <div class="card-header  bg-white">Header</div>
        <div class="card-body">
            <div :class="$style.infoGroup">
                <h2 :class="$style.title">Remetente</h2>
                <h2 :class="$style.info">allangodoy@gdigital.com.br</h2>
            </div>
            <div :class="$style.infoGroup">
                <h2 :class="$style.title">Status</h2>
                <h2 :class="$style.info">Enviado</h2>
            </div>
            <div :class="$style.infoGroup">
                <h2 :class="$style.title">Motificado em</h2>
                <h2 :class="$style.info">01/12/2022 às 14:01</h2>
            </div>
        </div>
    </div>

</template>

<style module>

.title {
    font-size: .9rem;
    color: var(--color-dark);
    font-weight: normal;
}

.info {
    font-size: .8rem;
    color: var(--color-light-grey);
    font-weight: normal;
}

.infoGroup {
    margin-bottom: .6rem;
}


</style>
