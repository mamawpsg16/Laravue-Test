<template>
    <li>
        <span v-if="isActive">-></span>
        {{ people }}
    </li>
</template>

<script setup>
import { onUpdated } from 'vue';

const props = defineProps({
// activeId: Number,
isActive: Boolean,
people:String,
id:Number
});

// const details = await axios.get('/api/getDetails');

onUpdated(()=>{
console.log('updating '+ props.id);
})
</script>

<style lang="scss" scoped>

</style>