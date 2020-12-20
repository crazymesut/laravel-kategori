<template>
    <div class="container-fluid">
        <b-modal
            ref="new-category"
            ok-title="Kaydet"
            @ok="save"
            cancel-title="İptal Et"
            @cancel="cancelled"
            scrollable title="Yeni Kategori Ekle">
        </b-modal>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <b-button
                    @click="showModal('new-category')"
                    variant="success"
                    cancel-title="İptal Et"
                    size="sm">
                    <i class="far fa-plus-square"></i>
                </b-button>
                <button v-if="parent_id==null" @click="parent_id=0" type="button" class="btn btn-sm btn-info"><i
                    class="fas fa-arrow-down"></i>
                </button>
                <button v-if="parent_id!=null" @click="parent_id=null" type="button" class="btn btn-sm btn-info"><i
                    class="fas fa-arrow-up"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-hover table-fixed">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Üst ID</th>
                        <th scope="col">URL</th>
                        <th scope="col">Yönetim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <list
                        v-for="category in categories"
                        :categories="categories"
                        :category="category"
                        :parent_id="parent_id"
                        :key="category.id"
                        @changeParentId="changeParentId($event)"
                        @changeRootId="changeRootId($event)"
                    />
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
import List from '@/components/category/list'

export default {
    name: "category.index",
    data() {
        return {
            parent_id: null
        }
    },
    methods: {
        showModal(name) {
            this.$refs[name].show()
        },
        save(event) {
            console.log(event)
            alert()

            // Prevent modal from closing
            event.preventDefault()
            // Trigger submit handler
            // this.handleSubmit()

        },
        cancelled(event) {
            console.log(event)
        },
        changeParentId(id) {
            this.parent_id = id
        },
        changeRootId(id) {
            let category = this.categories.find(item => item.id == id);
            this.parent_id = category.parent_id;
        }
    },
    components: {List},
    props: ['categories'],
}
</script>

<style scoped>

</style>
