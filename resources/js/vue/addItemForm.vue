<template>
    <div class="addItem">
        <input type="text" v-model="item.name"/>
        <button @click="addItem();">
            <font-awesome-icon icon="plus-square"  :class="[item.name ? 'active' : 'inactive', 'plus']" />
        </button>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            item: {
                name: ""
            },
        }
    },
    methods: {
        addItem(){
            console.log(this.item)
            if(this.item.name === '') {
                return;
            }
            axios.post('api/item/store', {
                item: this.item
            }).then(response => {
                if(response.status === 201) {
                    this.item.name = ""
                    this.$emit('reloadlist')
                }
            }).catch(error=> {
                console.log(error);
            })
        }
    }
}
</script>
<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.plus {
    font-size: 20px;
}

.active {
    color: #008000FF;
}

.inactive {
    color: #999999;
}
</style>
