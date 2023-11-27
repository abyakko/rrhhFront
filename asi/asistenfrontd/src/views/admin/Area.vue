<script setup>
import { FilterMatchMode } from 'primevue/api';
import { ref, onMounted, onBeforeMount } from 'vue';
//import areaService from '@/service/areaService';
import { useToast } from 'primevue/usetoast';
import axios from 'axios';
//import XLSX from "xlsx";

const toast = useToast();

const areas = ref(null);
const areaDialog = ref(false);
const deleteareaDialog = ref(false);
const deleteareasDialog = ref(false);
const area = ref({});
const selectedareas = ref(null);
const dt = ref(null);
const filters = ref({});
const submitted = ref(false);


//const areaService = new areaService();

onBeforeMount(() => {
    initFilters();
});
onMounted(() => {
    axios.get('http://localhost:8080/asitenback/public/api/v1/areas')
        .then((response) => {
            // Los datos de la API se encuentran en response.data
            const apiData = response.data;
            console.log(apiData);
            // Hacer algo con los datos, por ejemplo, asignarlos a areas.value
            areas.value = apiData;
        })
        .catch((error) => {
            toast.add({ severity: 'success', summary: 'Successful', detail: 'No se pudo cargar la información', life: 3000, error });
        });
});

/*const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};*/

const openNew = () => {
    area.value = {};
    submitted.value = false;
    areaDialog.value = true;
};

const hideDialog = () => {
    areaDialog.value = false;
    submitted.value = false;
};

const guardararea = () => {
    submitted.value = true;
    console.log(area.value.nombre_area);

    if (area.value.nombre_area) {
        if (area.value.id) {
            axios.put('http://localhost:8080/asitenback/public/api/v1/areas/' + area.value.id, {
                    nombre_area: area.value.nombre_area,
                    sigla: area.value.nombre_area.substring(0, 3)
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
            axios.post('http://localhost:8080/asitenback/public/api/v1/areas',
            { 
                    nombre_area: area.value.nombre_area,
                    sigla: area.value.nombre_area.substring(0,3)
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
        areaDialog.value = false;
        area.value = {};
    }
};

const editarea = (editarea) => {
    area.value = { ...editarea };
    console.log(area);
    areaDialog.value = true;
};

const confirmDeletearea = (editarea) => {
    area.value = editarea;
    deleteareaDialog.value = true;
};

const deletearea = () => {
    areas.value = areas.value.filter((val) => val.id !== area.value.id);
    deleteareaDialog.value = false;
            axios.delete(`http://localhost:8080/asitenback/public/api/v1/areas/${area.value.id}`)
                .then((response) => {
                    console.log(response);
                    toast.add({ severity: 'success', summary: 'Exitoso', detail: 'Área eliminada', life: 3000 });
                    window.location.reload();
                })
                .catch((error) => {
                    console.error(error);
                    toast.add({ severity: 'danger', summary: 'Problema', detail: 'No se pudo eliminar el área', life: 3000 });
                });
    
    area.value = {};
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
    deleteareasDialog.value = true;
};*/
const deleteSelectedareas = () => {
    areas.value = areas.value.filter((val) => !selectedareas.value.includes(val));
    deleteareasDialog.value = false;
    selectedareas.value = null;
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
                            <Button label="Nueva Area" icon="pi pi-plus" class="p-button-success mr-2" @click="openNew" />
                        </div>
                    </template>

                    <template v-slot:end>
                        <Button label="Exportar" icon="pi pi-upload" class="p-button-help" @click="exportCSV($event)" />

                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="areas"
                    v-model:selection="selectedareas"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} areas"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div class="flex flex-column md:flex-row md:justify-content-between md:align-items-center">
                            <h5 class="m-0"><b>AREAS</b></h5>
                            <span class="block mt-2 md:mt-0 p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText v-model="filters['global'].value" placeholder="Buscar..." />
                            </span>
                        </div>
                    </template>
                    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
                    <Column field="nombre_area" header="Nombre del Área" :sortable="true" headerStyle="width:25%; min-width:10rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Nombre del Área</span>
                            {{ slotProps.data.nombre_area }}
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
                            <Button icon="pi pi-pencil" class="p-button-rounded p-button-success mr-2" @click="editarea(slotProps.data)" />
                            <Button icon="pi pi-trash" class="p-button-rounded p-button-warning mt-2" @click="confirmDeletearea(slotProps.data)" />
                        </template>
                    </Column>
                </DataTable>

                <Dialog v-model:visible="areaDialog" :style="{ width: '450px' }" header="NUEVA AREA" :modal="true" class="p-fluid">
                    <img :src="'demo/images/area/' + area.image" :alt="area.image" v-if="area.image" width="150" class="mt-0 mx-auto mb-5 block shadow-2" />
                    <div class="field">
                        <label for="name">Nombre del Area</label>
                        <InputText id="name" v-model.trim="area.nombre_area" required="true" autofocus :class="{ 'p-invalid': submitted && !area.nombre_area }" />
                        <small class="p-invalid" v-if="submitted && !area.nombre_area">Nombres es requerido.</small>
                    </div>

                    <template #footer>
                        <Button label="Cancelar" icon="pi pi-times" class="p-button-text" @click="hideDialog" />
                        <Button label="Guardar" icon="pi pi-check" class="p-button-text" @click="guardararea" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deleteareaDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="area"
                            >Esta seguro en eliminar el Área de <b>{{ area.nombre_area }}</b
                            >?</span
                        >
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteareaDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deletearea" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deleteareasDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="area">¿Esta seguro que quiere eliminar las Áreas seleccionadas?</span>
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteareasDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deleteSelectedareas" />
                    </template>
                </Dialog>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss"></style>
