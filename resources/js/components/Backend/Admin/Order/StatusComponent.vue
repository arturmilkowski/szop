<template>
    <div v-if="isEditing" class="form-group">
        <form v-on:keyup.enter="onSubmit" @submit.prevent="onSubmit" action="#" method="POST" novalidate>
            <select v-on:keyup.esc="cancelEditing" v-model="selected" ref="statusInput" class="form-control" id="status_id" name="status_id" required>
                <option v-for="s in statuses" v-bind:value="s.id" v-bind:key="s.id">
                    {{ s.display_name }}
                </option>
            </select>
            <button v-on:click="cancelEditing" type="button" class="btn btn-sm btn-outline-secondary">anuluj</button>
            <button v-on:click="onSubmit" type="button" class="btn btn-sm btn-outline-primary">wyślij</button>
        </form>
    </div>
    <div v-else>
        <span v-on:dblclick="onDblClick" class="badge" v-bind:class="[orderStatus.name]" v-bind:title="orderStatus.description">
            {{ orderStatus.display_name }}
        </span>
    </div>    
</template>

<script>
    export default {
        name: "Status",
        // inject: ["eventBus"],
        props: ["orderid", "status", "statuses"],
        data() {
            return {
                statusClass: this.status.name,
                isEditing: false,
                selected: this.status.id,
            }
        },
        mounted() {
            console.log('status mounted');
            // console.log("status:", this.status);
            this.$store.state.orderStatus = this.status;
        },
        computed: {
            orderStatus() {
                return this.$store.state.orderStatus;
            }            
        },
        methods: {
            onDblClick() {
                this.isEditing = true;
                this.$nextTick(() => this.$refs.statusInput.focus());
            },
            cancelEditing() {
                this.isEditing = false;
            },
            async onSubmit() {
                console.log(this.selected);
                this.isEditing = false;
                this.$store.dispatch("updateOrderStatus", {"orderID": this.orderid, "statusID": this.selected});
            }
        }
    }
</script>
