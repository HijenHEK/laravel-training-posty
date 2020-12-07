<template>
  <button @click="deleteData" class="text-xs text-white bg-red-600 border-2 px-1 rounded-lg">
                delete
    </button>
</template>

<script>
export default {
    props : ['action' , 'data'],
    methods : {
        deleteData(){
            axios.delete(this.action+this.data)
                .then(this.$emit('delete'))
        }
    }
}
</script>

<style>

</style>