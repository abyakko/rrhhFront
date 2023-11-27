<script setup>
import { FilterMatchMode } from 'primevue/api';
import { ref, onMounted, onBeforeMount } from 'vue';
//import uniinsService from '@/service/uniinsService';
import { useToast } from 'primevue/usetoast';
import axios from 'axios';
//import XLSX from "xlsx";

const toast = useToast();

const uniinss = ref(null);
const uniinsDialog = ref(false);
const deleteuniinsDialog = ref(false);
const deleteuniinssDialog = ref(false);
const uniins = ref({});
const selecteduniinss = ref(null);
const dt = ref(null);
const filters = ref({});
const submitted = ref(false);


//const uniinsService = new uniinsService();

onBeforeMount(() => {
    initFilters();
});
onMounted(() => {
    axios.get('http://localhost/asitenback/public/api/v1/uniins')
        .then((response) => {
            // Los datos de la API se encuentran en response.data
            const apiData = response.data;
            console.log(apiData);
            // Hacer algo con los datos, por ejemplo, asignarlos a uniinss.value
            uniinss.value = apiData;
        })
        .catch((error) => {
            toast.add({ severity: 'success', summary: 'Successful', detail: 'No se pudo cargar la información', life: 3000, error });
        });
});
/*const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};*/

const openNew = () => {
    uniins.value = {};
    submitted.value = false;
    uniinsDialog.value = true;
};

const hideDialog = () => {
    uniinsDialog.value = false;
    submitted.value = false;
};

const guardaruniins = () => {
    submitted.value = true;
    console.log(uniins.value.nombre_uniins);

    if (uniins.value.nombre_uniins) {
        if (uniins.value.id) {
            axios.put('http://localhost/asitenback/public/api/v1/uniinss/' + uniins.value.id, {
                    nombre_uniins: uniins.value.nombre_uniins,
                    sigla: uniins.value.nombre_uniins.substring(0, 3)
                })
                .then((result) => {
                    console.log(result);
                    toast.add({ severity: 'success', summary: result.data.mensaje, detail: result.data.mensaje, life: 3000 });
                    //window.location.reload();
                    window.location.reload();
                })
                .catch((result) => {
                    toast.add({ severity: 'danger', summary: result.data.mensaje, detail: result.data.mensaje, life: 3000 });
                    console.log(result);
                });
        } else {
            axios.post('http://localhost/asitenback/public/api/v1/uniinss',
            { 
                    nombre_uniins: uniins.value.nombre_uniins,
                    sigla: uniins.value.nombre_uniins.substring(0,3)
                }).then((result) => {
                    console.log(result);
                    toast.add({ severity: 'success', summary: 'Exitoso', detail: "ddd", life: 3000 });
                    window.location.reload();
                }).catch((err) => {
                    toast.add({ severity: 'danger', summary: 'Problema', detail: 'No se pudo actualizar', life: 3000 });
                    console.log(err);
                });

            //toast.add({ severity: 'success', summary: 'Exitoso', detail: "result", life: 3000 });
        }
        uniinsDialog.value = false;
        uniins.value = {};
    }
};

const edituniins = (edituniins) => {
    uniins.value = { ...edituniins };
    console.log(uniins);
    uniinsDialog.value = true;
};

const confirmDeleteuniins = (edituniins) => {
    uniins.value = edituniins;
    deleteuniinsDialog.value = true;
};

const deleteuniins = () => {
    uniinss.value = uniinss.value.filter((val) => val.id !== uniins.value.id);
    deleteuniinsDialog.value = false;
            axios.delete(`http://localhost/asitenback/public/api/v1/uniinss/${uniins.value.id}`)
                .then((response) => {
                    console.log(response);
                    toast.add({ severity: 'success', summary: 'Exitoso', detail: 'Área eliminada', life: 3000 });
                    window.location.reload();
                })
                .catch((error) => {
                    console.error(error);
                    toast.add({ severity: 'danger', summary: 'Problema', detail: 'No se pudo eliminar el área', life: 3000 });
                });
    
    uniins.value = {};
    toast.add({ severity: 'success', summary: 'Successful', detail: 'Área Eliminada', life: 3000 });
};



/*const createId = () => {
    let id = '';
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (let i = 0; i < 5; i++) {
        id += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return id;
};*/

const exportCSV = () => {
    dt.value.exportCSV();
};


/*const confirmDeleteSelected = () => {
    deleteuniinssDialog.value = true;
};*/
const deleteSelecteduniinss = () => {
    uniinss.value = uniinss.value.filter((val) => !selecteduniinss.value.includes(val));
    deleteuniinssDialog.value = false;
    selecteduniinss.value = null;
    toast.add({ severity: 'success', summary: 'Successful', detail: 'Área eliminada', life: 3000 });
};

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};









</script>

 


<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <Toast />
                <Toolbar class="mb-4">
                    <template v-slot:start>
                        <div class="my-2">
                            <Button label="Nueva uniins" icon="pi pi-plus" class="p-button-success mr-2" @click="openNew" />
                        </div>
                    </template>

                    <template v-slot:end>
                        <Button label="Exportar" icon="pi pi-upload" class="p-button-help" @click="exportCSV($event)" />

                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="uniinss"
                    v-model:selection="selecteduniinss"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} uniinss"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div class="flex flex-column md:flex-row md:justify-content-between md:align-items-center">
                            <h5 class="m-0"><b>uniinsS</b></h5>
                            <span class="block mt-2 md:mt-0 p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText v-model="filters['global'].value" placeholder="Buscar..." />
                            </span>
                        </div>
                    </template>
                    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
                    <Column field="nombre_uniins" header="Nombre del Área" :sortable="true" headerStyle="width:25%; min-width:10rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Nombre del Área</span>
                            {{ slotProps.data.nombre_uniins }}
                        </template>
                    </Column>
                    <Column field="sigla" header="Sigla" :sortable="true" headerStyle="width:25%; min-width:8rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Sigla</span>
                            {{ slotProps.data.sigla }}
                        </template>
                    </Column>
                    <Column headerStyle="min-width:10rem;">
                        <template #body="slotProps">
                            <Button icon="pi pi-pencil" class="p-button-rounded p-button-success mr-2" @click="edituniins(slotProps.data)" />
                            <Button icon="pi pi-trash" class="p-button-rounded p-button-warning mt-2" @click="confirmDeleteuniins(slotProps.data)" />
                        </template>
                    </Column>
                </DataTable>

                <Dialog v-model:visible="uniinsDialog" :style="{ width: '450px' }" header="NUEVA uniins" :modal="true" class="p-fluid">
                    <img :src="'demo/images/uniins/' + uniins.image" :alt="uniins.image" v-if="uniins.image" width="150" class="mt-0 mx-auto mb-5 block shadow-2" />
                    <div class="field">
                        <label for="name">Nombre del uniins</label>
                        <InputText id="name" v-model.trim="uniins.nombre_uniins" required="true" autofocus :class="{ 'p-invalid': submitted && !uniins.nombre_uniins }" />
                        <small class="p-invalid" v-if="submitted && !uniins.nombre_uniins">Nombres es requerido.</small>
                    </div>

                    <template #footer>
                        <Button label="Cancelar" icon="pi pi-times" class="p-button-text" @click="hideDialog" />
                        <Button label="Guardar" icon="pi pi-check" class="p-button-text" @click="guardaruniins" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deleteuniinsDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="uniins"
                            >Esta seguro en eliminar el Área de <b>{{ uniins.nombre_uniins }}</b
                            >?</span
                        >
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteuniinsDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deleteuniins" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deleteuniinssDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="uniins">¿Esta seguro que quiere eliminar las Áreas seleccionadas?</span>
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteuniinssDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deleteSelecteduniinss" />
                    </template>
                </Dialog>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss"></style>
