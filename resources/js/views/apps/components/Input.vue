<template>
    <input type="text" :value="modelValue" @input="updateValue">
</template>

<script setup>
const props = defineProps(['modelValue']);
const emits = defineEmits(['update:modelValue']);

const updateValue = (e) =>{
    return emits('update:modelValue',e.target.value);
}

</script>

<style lang="scss" scoped>

</style>