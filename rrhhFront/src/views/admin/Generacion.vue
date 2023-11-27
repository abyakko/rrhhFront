<script setup>
import { FilterMatchMode } from 'primevue/api';
import { ref, onMounted, onBeforeMount } from 'vue';
//import generacionService from '@/service/generacionService';
import { useToast } from 'primevue/usetoast';
import axios from 'axios';
//import XLSX from "xlsx";

const toast = useToast();

const generacions = ref(null);
const generacionDialog = ref(false);
const deletegeneracionDialog = ref(false);
const deletegeneracionsDialog = ref(false);
const generacion = ref({});
const selectedgeneracions = ref(null);
const dt = ref(null);
const filters = ref({});
const submitted = ref(false);


//const generacionService = new generacionService();

onBeforeMount(() => {
    initFilters();
});
onMounted(() => {
    axios.get('http://localhost/asitenback/public/api/v1/generacions')
        .then((response) => {
            // Los datos de la API se encuentran en response.data
            const apiData3 = response.data;
            console.log(apiData3);
            // Hacer algo con los datos, por ejemplo, asignarlos a generacions.value
            generacions.value = apiData3;
        })
        .catch((error) => {
            toast.add({ severity: 'success', summary: 'Successful', detail: 'No se pudo cargar la información', life: 3000, error });
        });
});
/*const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};*/

const openNew = () => {
    generacion.value = {};
    submitted.value = false;
    generacionDialog.value = true;
};

const hideDialog = () => {
    generacionDialog.value = false;
    submitted.value = false;
};

const guardargeneracion = () => {
    submitted.value = true;
    console.log(generacion.value.nombre_generacion);

    if (generacion.value.nombre_generacion) {
        if (generacion.value.id) {
            axios.put('http://localhost/asitenback/public/api/v1/generacions/' + generacion.value.id, {
                    nombre_generacion: generacion.value.nombre_generacion,
                    sigla: generacion.value.nombre_generacion.substring(0, 3)
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
            axios.post('http://localhost/asitenback/public/api/v1/generacions',
            { 
                    generacion: generacion.value.nombre_generacion,
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
        generacionDialog.value = false;
        generacion.value = {};
    }
};

const editgeneracion = (editgeneracion) => {
    generacion.value = { ...editgeneracion };
    console.log(generacion);
    generacionDialog.value = true;
};

const confirmDeletegeneracion = (editgeneracion) => {
    generacion.value = editgeneracion;
    deletegeneracionDialog.value = true;
};

const deletegeneracion = () => {
    generacions.value = generacions.value.filter((val) => val.id !== generacion.value.id);
    deletegeneracionDialog.value = false;
            axios.delete(`http://localhost/asitenback/public/api/v1/generacions/${generacion.value.id}`)
                .then((response) => {
                    console.log(response);
                    toast.add({ severity: 'success', summary: 'Exitoso', detail: 'Área eliminada', life: 3000 });
                    window.location.reload();
                })
                .catch((error) => {
                    console.error(error);
                    toast.add({ severity: 'danger', summary: 'Problema', detail: 'No se pudo eliminar el área', life: 3000 });
                });
    
    generacion.value = {};
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
    deletegeneracionsDialog.value = true;
};*/
const deleteSelectedgeneracions = () => {
    generacions.value = generacions.value.filter((val) => !selectedgeneracions.value.includes(val));
    deletegeneracionsDialog.value = false;
    selectedgeneracions.value = null;
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
                            <Button label="Nueva generacion" icon="pi pi-plus" class="p-button-success mr-2" @click="openNew" />
                        </div>
                    </template>

                    <template v-slot:end>
                        <Button label="Exportar" icon="pi pi-upload" class="p-button-help" @click="exportCSV($event)" />

                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="generacions"
                    v-model:selection="selectedgeneracions"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} generacions"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div class="flex flex-column md:flex-row md:justify-content-between md:align-items-center">
                            <h5 class="m-0"><b>GENERACIÓN</b></h5>
                            <span class="block mt-2 md:mt-0 p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText v-model="filters['global'].value" placeholder="Buscar..." />
                            </span>
                        </div>
                    </template>
                    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
                    <Column field="generacion" header="Generación" :sortable="true" headerStyle="width:25%; min-width:10rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Generación</span>
                            {{ slotProps.data.generacion }}
                        </template>
                    </Column>
                    
                    <Column headerStyle="min-width:10rem;">
                        <template #body="slotProps">
                            <Button icon="pi pi-pencil" class="p-button-rounded p-button-success mr-2" @click="editgeneracion(slotProps.data)" />
                            <Button icon="pi pi-trash" class="p-button-rounded p-button-warning mt-2" @click="confirmDeletegeneracion(slotProps.data)" />
                        </template>
                    </Column>
                </DataTable>

                <Dialog v-model:visible="generacionDialog" :style="{ width: '450px' }" header="NUEVA generacion" :modal="true" class="p-fluid">
                    <img :src="'demo/images/generacion/' + generacion.image" :alt="generacion.image" v-if="generacion.image" width="150" class="mt-0 mx-auto mb-5 block shadow-2" />
                    <div class="field">
                        <label for="name">Nombre del generacion</label>
                        <InputText id="name" v-model.trim="generacion.nombre_generacion" required="true" autofocus :class="{ 'p-invalid': submitted && !generacion.nombre_generacion }" />
                        <small class="p-invalid" v-if="submitted && !generacion.nombre_generacion">Nombres es requerido.</small>
                    </div>

                    <template #footer>
                        <Button label="Cancelar" icon="pi pi-times" class="p-button-text" @click="hideDialog" />
                        <Button label="Guardar" icon="pi pi-check" class="p-button-text" @click="guardargeneracion" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deletegeneracionDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="generacion"
                            >Esta seguro en eliminar el Área de <b>{{ generacion.nombre_generacion }}</b
                            >?</span
                        >
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deletegeneracionDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deletegeneracion" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deletegeneracionsDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="generacion">¿Esta seguro que quiere eliminar las Áreas seleccionadas?</span>
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deletegeneracionsDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deleteSelectedgeneracions" />
                    </template>
                </Dialog>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss"></style>
