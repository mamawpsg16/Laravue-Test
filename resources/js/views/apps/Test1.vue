<template>
    <div class="d-flex">
        <div>
            <img :src="selectedVariantDetails.image" style="width:200px; height:200px;">
            <p>{{ variantMaintenace }}</p>
            <p>User Count : {{ variantUserCount }}</p>
            <button type="button" @click.prevent="updateSaleStatus(selectedVariantDetails.id)">Sale Status {{
                selectedVariantDetails.onSale ? 'Sale' : 'Regular' }}</button>
            <ul>
                <li v-for="(variant, index) in variants" :key="variant.id" style="width:20%;" @mouseover="updateVariant(index)">{{ variant.name
                }}</li>
            </ul>
            <h4>Onsale Products</h4>
            <p v-for="variant in checkVariantSaleStatus" :key="variant.id">{{ variant.name }}</p>
        </div>
        <div>
            <p>{{ greetings }}</p>
            <input type="text" v-model="name">
            <button @click.prevent="count++">{{ count }} +</button>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref, computed } from 'vue';
import image1 from '../../../assets/images/1.png'
import image2 from '../../../assets/images/2.png'
import image3 from '../../../assets/images/3.png'
const selectedVariant = ref(0);
const name = ref('Ralph');
const variants = reactive([
    {
        id: 0,
        name: 'Google',
        image: image1,
        user_count: 10,
        onSale: true,
        maintenance: false,
    },
    {
        id: 1,
        name: 'Google Workspace',
        onSale: true,
        image: image2,
        user_count: 25,
        maintenance: false,
    },
    {
        id: 2,
        name: 'Hangouts',
        onSale: false,
        image: image3,
        user_count: 66,
        maintenance: true,
    },
])



const count = ref(0);

/** bad */
// const greetings = () =>{
//     console.log('SHEESHAS');
//     return 'Hello '+name.value+' gretings';
// }

/** good */
const greetings = computed(() => {
    console.log('SHEESH');

    return 'Hello ' + name.value + ' gretings';
})

const updateVariant = (index) => {
    selectedVariant.value = index;
}

const selectedVariantDetails = computed(() => {
    return variants.find((item) => item.id === selectedVariant.value);
    //  const variant = variants.filter((item) => item.id === selectedVariant.value)[0].image;
});

const variantMaintenace = computed(() => {
    return variants.find((item) => item.id === selectedVariant.value).maintenance ? 'Maintenance' : 'Online';
})

const variantUserCount = computed(() => {
    return variants.find((item) => item.id === selectedVariant.value).user_count;
})

const checkVariantSaleStatus = computed(() => {
    const onSaleProducts = variants.filter((item) => item.onSale === true);
    return onSaleProducts;
})

const updateSaleStatus = (variant_id) => {
    const index = variants.findIndex((item) => item.id === variant_id);
    console.log(variant_id, index);
    if (index !== -1) {
        variants[index].onSale = !variants[index].onSale; // Toggle the onSale status
    }
}
</script>

<style lang="scss" scoped></style>