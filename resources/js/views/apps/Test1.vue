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
const dummyData = [{ name: 'Kevin', b: '', c: 1 },{ name: 'Kevin', b: 4, c: 2 },{ name: 'Rojenx', b: '', c: 2 },{ name: 'Kevin', b: 4, c: 2 },{ name: 'Rojenx', b: 4, c: 2 },];

// checkDataForNullEmpty
let nullData = new Set();
dummyData.forEach(object =>{
    for (const key in object) {
      let value = object[key];
      if(value == null || value == ''){
        nullData.add(key);
      }
    }
})
console.log(Array.from(nullData),'NULL DATA');

let initializeObject = {};
// checkDuplicateCustomers
dummyData.forEach(data =>{
    if(initializeObject[data.name]){
        initializeObject[data.name]++;
    }else{
        initializeObject[data.name] = 1;
    }
})
let duplicateCustomers = Object.keys(initializeObject).filter(key => initializeObject[key] > 1); 


//remove a property
let shallowdummyData = dummyData.slice();
let removeProperty = shallowdummyData.map(data => {
    delete data.name;
    return data;
});
console.log(removeProperty,'removeProperty');

//add a property
let addProperty = removeProperty.map(data => {
    return {...data, id:Math.trunc(Math.random() * 10 + 1)};
});


//Reverse a String:
let reverse = 'kevin';
let reversedWord = '';
for(let i = reverse.length -1; i >= 0; i--){
    reversedWord+= reverse[i];
}
console.log(reversedWord,'Reverse a String');


//Palindrome Check
function wordsForPalindromeTest(word){
    let reversedWord = '';
    for(let i = word.trim().length -1; i >= 0; i--){
        reversedWord += word[i];
    }
    if(reversedWord == word){
        return 'Palindrome';
    }
    return 'Not Palindrome';
}
console.log(wordsForPalindromeTest('repaper'),'!PALINDROME CHECK');

//FizzBuzz
// Write a function that prints numbers from 1 to 100. For multiples of 3, print "Fizz",
//  for multiples of 5, print "Buzz", and for multiples of both 3 and 5, print "FizzBuzz".
let fizzBuzzArray = [];
function fizzBuzz(number){
    for (let i = 1; i < number; i++){
        if(i % 3 == 0 && i % 5 == 0){
             fizzBuzzArray.push("FizzBuzz");
        }else if(i % 3 == 0){
             fizzBuzzArray.push("Fizz");
        }else if(i % 5 == 0){
             fizzBuzzArray.push("Buzz");
        }else{
             fizzBuzzArray.push(i);
        }
    }
}
// console.log(fizzBuzz(100),fizzBuzzArray,' FIZZ BUZZ');

//LOOK FOR THE LONGEST WORD
const sentence = "This is a test sentence to find the longest word.";

//REDUCE
// let longestWord = sentence.split(" ").reduce((prevWord,currWord) => prevWord.length > currWord.length ? prevWord : currWord ,'');

//FOR LOOP
let longestWord = '';
let splitSentence = sentence.split(" ");
for(let i = 0 ; i <  splitSentence.length -1; i++){
    if(splitSentence[i].length > longestWord.length){
        longestWord = splitSentence[i]
    }
}
console.log(longestWord,'LONGEST WORD')

// ANAGRAM
const word1 = "listen";
const word2 = "silent";
function anagram(word1,word2){
    return word1.toLowerCase().split('').sort().join('') == word2.toLowerCase().split('').sort().join('') ? 'Anagram' : 'Not Anagram';
}
console.log(anagram(word1,word2),'ANAGRAM');

//ROTATE ARRAY
let numbers = [1,2,3,4,5];
function rotateArray(array,position){
    const arrayShallowCopy = [...array];
    for (let index = 0; index < position; index++) {
        let element = arrayShallowCopy.pop();
        arrayShallowCopy.unshift(element);
    }
    return arrayShallowCopy;
    
}
console.log(rotateArray(numbers,2),'ROTATE ARRAY');


/** COUNT VOWELS */
let vowels = ['a','e','i','o','u'];
let vowel_count = 0;
function countVowels(sentence){
    let trimmed_sentence = sentence.replace(/\s/g, "").toLowerCase();
    for (let index = 0; index < trimmed_sentence.length; index++) {
        if(vowels.includes(trimmed_sentence[index])){
            vowel_count++;
        };
    }
}
countVowels('hello AWFWFEworld')
console.log(vowel_count,'COUNT VOWELS');

/** FIND MAX VALUE */
let numbersArray = [1,242,2,3,4,5,6,7,8];
// console.log(Math.max(...numbersArray),'MAX');
let max = 0;
function checkMaxInteger(array){
    for (let index = 0; index < numbersArray.length; index++) {
        const element = array[index];
        if(element > max){
            max = element;
        }
    }
}
checkMaxInteger(numbersArray)
console.log(max,'MAX');


// Remove Duplicates:
let withDuplicates = [1, 2, 2, 3, 4, 4, 5];
console.log([...new Set([...withDuplicates])],'REMOVE DUPLICATE');


/** Title Case: */
let titleCase = 'this is a test';
let updatedTitleCase = titleCase.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

/**Reverse Array: */
let reverseNumArray = [1, 2, 3, 4];
let reverseNums = [];
console.log(reverseNumArray.length,'LKEAWS')
for (let index = reverseNumArray.length -1 ; index >= 0 ; index--) {
    reverseNums.push(reverseNumArray[index]);
}
console.log(reverseNums,'reverse 1');
console.log(reverseNumArray.reverse(),'REVERSE');

/** FIND MISSING NUMBER */
let findMissingNumber = [1, 2, 4, 5,8];
let missingNumber =[]; 
for (let index = 0; index < findMissingNumber.length - 1; index++) {
    const currentElement = findMissingNumber[index];
    const nextElement    = findMissingNumber[index + 1];

    const diff = nextElement - currentElement;
    if(diff > 1){
        for (let index = 1; index < diff; index++) {
            missingNumber.push(currentElement + index);
        }
    }
    
}
console.log(missingNumber,'MISSING NUMBER  ');
</script>

<style lang="scss" scoped></style>