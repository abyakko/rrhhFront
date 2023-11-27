<script setup>
import { FilterMatchMode } from 'primevue/api';
import { ref, onMounted, onBeforeMount } from 'vue';
//import carreraService from '@/service/carreraService';
import { useToast } from 'primevue/usetoast';
import axios from 'axios';
//import XLSX from "xlsx";

const toast = useToast();

const carreras = ref(null);
const carreraDialog = ref(false);
const deletecarreraDialog = ref(false);
const deletecarrerasDialog = ref(false);
const carrera = ref({});
const selectedcarreras = ref(null);
const dt = ref(null);
const filters = ref({});
const submitted = ref(false);


//const carreraService = new carreraService();

onBeforeMount(() => {
    initFilters();
});
onMounted(() => {
    axios.get('http://localhost:8080/asitenback/public/api/v1/carreras')
        .then((response) => {
            // Los datos de la API se encuentran en response.data
            const apiData = response.data;
            console.log(apiData);
            // Hacer algo con los datos, por ejemplo, asignarlos a carreras.value
            carreras.value = apiData;
        })
        .catch((error) => {
            toast.add({ severity: 'success', summary: 'Successful', detail: 'No se pudo cargar la información', life: 3000, error });
        });
});
/*const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};*/

const openNew = () => {
    carrera.value = {};
    submitted.value = false;
    carreraDialog.value = true;
};

const hideDialog = () => {
    carreraDialog.value = false;
    submitted.value = false;
};

const guardarcarrera = () => {
    submitted.value = true;
    console.log(carrera.value.nombre_carrera);

    if (carrera.value.nombre_carrera) {
        if (carrera.value.id) {
            axios.put('http://localhost:8080/asitenback/public/api/v1/carreras/' + carrera.value.id, {
                    nombre_carrera: carrera.value.nombre_carrera,
                    sigla: carrera.value.nombre_carrera.substring(0, 3)
                })
                .then((result) => {
                    console.log(result);
                    toast.add({ severity: 'success', summary: result.data.mensaje, detail: result.data.mensaje, life: 5000 });
                    //window.location.reload();
                    window.location.reload();
                })
                .catch((result) => {
                    toast.add({ severity: 'danger', summary: result.data.mensaje, detail: result.data.mensaje, life: 5000 });
                    console.log(result);
                });
        } else {
            axios.post('http://localhost:8080/asitenback/public/api/v1/carreras',
            { 
                    nombre_carrera: carrera.value.nombre_carrera,
                    sigla: carrera.value.nombre_carrera.substring(0,3)
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
        carreraDialog.value = false;
        carrera.value = {};
    }
};

const editcarrera = (editcarrera) => {
    carrera.value = { ...editcarrera };
    console.log(carrera);
    carreraDialog.value = true;
};

const confirmDeletecarrera = (editcarrera) => {
    carrera.value = editcarrera;
    deletecarreraDialog.value = true;
};

const deletecarrera = () => {
    carreras.value = carreras.value.filter((val) => val.id !== carrera.value.id);
    deletecarreraDialog.value = false;
            axios.delete(`http://localhost:8080/asitenback/public/api/v1/carreras/${carrera.value.id}`)
                .then((response) => {
                    console.log(response);
                    toast.add({ severity: 'success', summary: 'Exitoso', detail: 'Carrera eliminada', life: 3000 });
                    window.location.reload();
                })
                .catch((error) => {
                    console.error(error);
                    toast.add({ severity: 'danger', summary: 'Problema', detail: 'No se pudo eliminar la Carrera', life: 3000 });
                });
    
    carrera.value = {};
    toast.add({ severity: 'success', summary: 'Successful', detail: 'Carrera Eliminada', life: 3000 });
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
    deletecarrerasDialog.value = true;
};*/
const deleteSelectedcarreras = () => {
    carreras.value = carreras.value.filter((val) => !selectedcarreras.value.includes(val));
    deletecarrerasDialog.value = false;
    selectedcarreras.value = null;
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
                            <Button label="Nueva Carrera" icon="pi pi-plus" class="p-button-info mr-2" @click="openNew" />
                        </div>
                    </template>

                    <template v-slot:end>
                        <Button label="Exportar" icon="pi pi-upload" class="p-button-help" @click="exportCSV($event)" />

                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="carreras"
                    v-model:selection="selectedcarreras"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25, 100]"
                    currentPageReportTemplate="Mirando de {first} a {last} de {totalRecords} Carreras"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div class="flex flex-column md:flex-row md:justify-content-between md:align-items-center">
                            <h5 class="m-0"><b>CARRERAS</b></h5>
                            <span class="block mt-2 md:mt-0 p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText v-model="filters['global'].value" placeholder="Buscar..." />
                            </span>
                        </div>
                    </template>
                    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
                    <Column field="nombre_carrera" header="Nombre de la Carrera" :sortable="true" headerStyle="width:25%; min-width:10rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Nombre de la Carrera</span>
                            {{ slotProps.data.nombre_carrera }}
                        </template>
                    </Column>
                   
                    <Column headerStyle="min-width:10rem;">
                        <template #body="slotProps">
                            <Button icon="pi pi-pencil" class="p-button-rounded p-button-success mr-2" @click="editcarrera(slotProps.data)" />
                            <Button icon="pi pi-trash" class="p-button-rounded p-button-warning mt-2" @click="confirmDeletecarrera(slotProps.data)" />
                        </template>
                    </Column>
                </DataTable>

                <Dialog v-model:visible="carreraDialog" :style="{ width: '450px' }" header="NUEVA CARRERA" :modal="true" class="p-fluid">
                    <img :src="'demo/images/carrera/' + carrera.image" :alt="carrera.image" v-if="carrera.image" width="150" class="mt-0 mx-auto mb-5 block shadow-2" />
                    <div class="field">
                        <label for="name">Nombre del carrera</label>
                        <InputText id="name" v-model.trim="carrera.nombre_carrera" required="true" autofocus :class="{ 'p-invalid': submitted && !carrera.nombre_carrera }" />
                        <small class="p-invalid" v-if="submitted && !carrera.nombre_carrera">Nombres es requerido.</small>
                    </div>

                    <template #footer>
                        <Button label="Cancelar" icon="pi pi-times" class="p-button-text" @click="hideDialog" />
                        <Button label="Guardar" icon="pi pi-check" class="p-button-text" @click="guardarcarrera" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deletecarreraDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="carrera"
                            >Esta seguro en eliminar la Carrera de <b>{{ carrera.nombre_carrera }}</b
                            >?</span
                        >
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deletecarreraDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deletecarrera" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deletecarrerasDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="carrera">¿Esta seguro que quiere eliminar las Carreras seleccionadas?</span>
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deletecarrerasDialog = false" />
                        <Button label="Si" icon="pi pi-check" class="p-button-text" @click="deleteSelectedcarreras" />
                    </template>
                </Dialog>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss"></style>
