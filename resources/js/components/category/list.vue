<template>
    <tr v-if="parent_id==0 || category.parent_id==parent_id">
        <td>{{ category.id }}</td>
        <td>{{ category.name }}</td>
        <td>{{ category.parent_id }}</td>
        <td>{{ category.slug }}</td>
        <td>
            <button
                @click="edit(category.slug)"
                type="button"
                class="btn btn-sm btn-primary">
                <i class="fas fa-edit fa-sm"></i>
            </button>
            <button
                @click="deletem(category.slug)"
                type="button"
                class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt fa-sm"></i>
            </button>
            <button
                @click="$emit('changeRootId', category.parent_id);"
                type="button"
                :disabled="category.parent_id==null"
                class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button
                @click="$emit('changeParentId', category.id);"
                type="button"
                :disabled="!subCategory"
                class="btn btn-sm btn-success">
                <i class="fas fa-arrow-right"></i>
            </button>
        </td>
    </tr>
</template>

<script>
export default {
    name: "list",
    props: ['categories', 'category', 'parent_id'],
    computed: {
        subCategory() {
            let subCategory = this.categories.find(item => item.parent_id == this.category.id);
            if (subCategory) {
                return true;
            } else {
                return false
            }
        }
    },
    methods: {
        edit(slug) {
            alert(slug)
        },
        deletem(slug) {
            alert(slug)
        }
    },
}
</script>

<style scoped>

</style>
