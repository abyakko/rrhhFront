<script setup>
import { FilterMatchMode } from 'primevue/api';
import { ref, onMounted, onBeforeMount } from 'vue';
//import personaService from '@/service/personaService';
import { useToast } from 'primevue/usetoast';
import axios from 'axios';
const toast = useToast();

const uploadedFiles = ref([]);

const personas = ref(null);
const areas = ref(null);
const carreras = ref(null);
const generacions = ref(null);
const personaDialog = ref(false);
const deletepersonaDialog = ref(false);
const deletepersonasDialog = ref(false);
const persona = ref({});
const selectedpersonas = ref(null);
const dt = ref(null);
const filters = ref({});
const submitted = ref(false);
const extensiones = ref([
    { lugar: 'LP', value: '1' },
    { lugar: 'OR', value: '2' },
    { lugar: 'PT', value: '3' },
    { lugar: 'CB', value: '4' },
    { lugar: 'SC', value: '5' },
    { lugar: 'BN', value: '6' },
    { lugar: 'PA', value: '7' },
    { lugar: 'TJ', value: '8' },
    { lugar: 'CH', value: '9' }
]);

//const personaService = new personaService();

onBeforeMount(() => {
    initFilters();
});
onMounted(() => {
        axios.get(`${import.meta.env.API_BASE_URL}/personal`)
            .then((response) => {
                // Los datos de la API se encuentran en response.data
                const apiData1 = response.data;
                console.log(response.data);
                // Hacer algo con los datos, por ejemplo, asignarlos a personas.value
                personas.value = apiData1;
            })
            .catch((error) => {
                toast.add({ severity: 'success', summary: response.data, detail: 'No se pudo cargar la información', life: 3000, error });
                console.log(error);
            });

        axios.get(`${import.meta.env.API_BASE_URL}/areas`)
            .then((response) => {
                // Los datos de la API se encuentran en response.data
                const apiData2 = response.data;
                console.log(response.data);
                // Hacer algo con los datos, por ejemplo, asignarlos a personas.value
                areas.value = apiData2;
            })
            .catch((response) => {
                toast.add({ severity: 'success', summary: response, detail: 'No se pudo cargar la información', life: 3000 });
                console.log(response);
            });
        
        axios.get(`${import.meta.env.API_BASE_URL}/carreras`)
            .then((response) => {
                // Los datos de la API se encuentran en response.data
                const apiData3 = response.data;
                console.log(response.data);
                // Hacer algo con los datos, por ejemplo, asignarlos a personas.value
                carreras.value = apiData3;
            })
            .catch((response) => {
                toast.add({ severity: 'success', summary: response, detail: 'No se pudo cargar la información', life: 3000 });
                console.log(response);
            });

        axios.get(`${import.meta.env.API_BASE_URL}/generacions`)
            .then((response) => {
                // Los datos de la API se encuentran en response.data
                const apiData4 = response.data;
                console.log(response.data);
                // Hacer algo con los datos, por ejemplo, asignarlos a personas.value
                generacions.value = apiData4;
            })
            .catch((response) => {
                toast.add({ severity: 'success', summary: response, detail: 'No se pudo cargar la información', life: 3000 });
                console.log(response);
            });
});
/*const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};*/

const openNew = () => {
    persona.value = {};
    submitted.value = false;
    personaDialog.value = true;
};

const hideDialog = () => {
    personaDialog.value = false;
    submitted.value = false;
};

const guardarpersona = () => {
    submitted.value = true;
    console.log(persona);
    if (persona.value.name && persona.value.name.trim() && persona.value.price) {
        if (persona.value.id) {
            persona.value.inventoryStatus = persona.value.inventoryStatus.value ? persona.value.inventoryStatus.value : persona.value.inventoryStatus;
            personas.value[findIndexById(persona.value.id)] = persona.value;
            toast.add({ severity: 'success', summary: 'Successful', detail: 'Área Actualizada', life: 3000 });
        } else {
            persona.value.id = createId();
            persona.value.code = createId();
            persona.value.image = 'persona-placeholder.svg';
            persona.value.inventoryStatus = persona.value.inventoryStatus ? persona.value.inventoryStatus.value : 'INSTOCK';
            personas.value.push(persona.value);
            toast.add({ severity: 'success', summary: 'Successful', detail: 'Área Creada', life: 3000 });
        }
        personaDialog.value = false;
        persona.value = {};
    }
};

const editpersona = (editpersona) => {
    persona.value = { ...editpersona };
    console.log(persona);
    personaDialog.value = true;
};

const confirmDeletepersona = (editpersona) => {
    persona.value = editpersona;
    deletepersonaDialog.value = true;
};

const deletepersona = () => {
    personas.value = personas.value.filter((val) => val.id !== persona.value.id);
    deletepersonaDialog.value = false;
    persona.value = {};
    toast.add({ severity: 'success', summary: 'Successful', detail: 'Área Eliminada', life: 3000 });
};

const findIndexById = (id) => {
    let index = -1;
    for (let i = 0; i < personas.value.length; i++) {
        if (personas.value[i].id === id) {
            index = i;
            break;
        }
    }
    return index;
};

const createId = () => {
    let id = '';
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (let i = 0; i < 5; i++) {
        id += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return id;
};

const exportCSV = () => {
    dt.value.exportCSV();
};

const confirmDeleteSelected = () => {
    deletepersonasDialog.value = true;
};
const deleteSelectedpersonas = () => {
    personas.value = personas.value.filter((val) => !selectedpersonas.value.includes(val));
    deletepersonasDialog.value = false;
    selectedpersonas.value = null;
    toast.add({ severity: 'success', summary: 'Successful', detail: 'Área eliminada', life: 3000 });
};

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS }
    };
};



const onUpload = (event) => {
    // Obtener información sobre los archivos subidos
    const files = event.files;

    // Almacenar información en uploadedFiles para referencia posterior
    uploadedFiles.value = files;

    // Mostrar información en la consola
    console.log('Archivos subidos:', files);

    // Lógica adicional, por ejemplo, enviar al backend de Laravel
    //sendFilesToBackend(files);

    // Mostrar mensaje de éxito
    toast.add({ severity: 'info', summary: 'Success', detail: 'File(s) Uploaded', life: 3000 });
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
                            <Button label="Nuevo Usuario" icon="pi pi-plus" class="p-button-success mr-2" @click="openNew" />
                        </div>
                    </template>

                    <template v-slot:end>
                        <Button label="Export" icon="pi pi-upload" class="p-button-help" @click="exportCSV($event)" />
                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="personas"
                    v-model:selection="selectedpersonas"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} personas"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div class="flex flex-column md:flex-row md:justify-content-between md:align-items-center">
                            <h5 class="m-0">ADMINISTRAR PERSONAL</h5>
                            <span class="block mt-2 md:mt-0 p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText v-model="filters['global'].value" placeholder="Buscar..." />
                            </span>
                        </div>
                    </template>
                    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
                    <Column field="nombres" header="NOMBRES" :sortable="true" headerStyle="width:14%; min-width:10rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Nombres</span>
                            {{ slotProps.data.nombres }}
                        </template>
                    </Column>
                    <Column field="apellido1" header="AP. PATERNO" :sortable="true" headerStyle="width:14%; min-width:8rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Sigla</span>
                            {{ slotProps.data.apellido1 }}
                        </template>
                    </Column>
                    <Column field="apellido2" header="AP. MATERNO" :sortable="true" headerStyle="width:14%; min-width:8rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Sigla</span>
                            {{ slotProps.data.apellido2 }}
                        </template>
                    </Column>
                    <Column field="carreras.nombre_carrera" header="CARRERA" :sortable="true" headerStyle="width:14%; min-width:8rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Carrera</span>
                            {{ slotProps.data.carreras.nombre_carrera }}
                        </template>
                    </Column>

                    <Column field="areas.nombre_area" header="ÁREA" :sortable="true" headerStyle="width:14%; min-width:8rem;">
                        <template #body="slotProps">
                            <span class="p-column-title">Área</span>
                            {{ slotProps.data.areas.nombre_area }}
                        </template>
                    </Column>
                    <Column headerStyle="min-width:10rem;">
                        <template #body="slotProps">
                            <Button icon="pi pi-pencil" class="p-button-rounded p-button-success mr-2" @click="editpersona(slotProps.data)" />
                            <Button icon="pi pi-trash" class="p-button-rounded p-button-warning mt-2" @click="confirmDeletepersona(slotProps.data)" />
                        </template>
                    </Column>
                </DataTable>

                <Dialog v-model:visible="personaDialog" :style="{ width: '450px' }" header="Usuario Detalle" :modal="true" class="p-fluid">
                    <img :src="'demo/images/persona/' + persona.image" :alt="persona.image" v-if="persona.image" width="150" class="mt-0 mx-auto mb-5 block shadow-2" />
                    <div class="field">
                        <label for="name"><b>NOMBRES</b></label>
                        <InputText id="name" v-model.trim="persona.nombres" required="true" autofocus :class="{ 'p-invalid': submitted && !persona.nombres }" placeholder="NOMBRES"/>
                        <small class="p-invalid" v-if="submitted && !persona.nombres">Nombres es requerido.</small>
                    </div>
                    <div class="field">
                        <label for="apellido1"><b>APELLIDO PATERNO</b></label>
                        <InputText id="apellido1" v-model.trim="persona.apellido1" required="true" autofocus :class="{ 'p-invalid': submitted && !persona.apellido1 }" placeholder="APELLIDO PATERNO"/>
                        <small class="p-invalid" v-if="submitted && !persona.apellido1">Apellido es requerido.</small>
                    </div>
                    <div class="field">
                        <label for="apellido2"><b>APELLIDO MATERNO</b></label>
                        <InputText id="apellido2" v-model.trim="persona.apellido2" required="true" autofocus :class="{ 'p-invalid': submitted && !persona.apellido2 }" placeholder="APELLIDO MATERNO"/>
                        <small class="p-invalid" v-if="submitted && !persona.apellido2">Nombres es requerido.</small>
                    </div>

                    <div class="field">
                        <label for="celular"><b>CELULAR</b></label>
                        <InputText id="celular" type="number" v-model.trim="persona.celular" required="true" autofocus placeholder="CELULAR O TELEFONO" />
                    </div>
                    
                    <div class="field">
                        <label for="direccion"><b>DIRECCIÓN</b></label>
                        <InputText id="direccion" type="text" v-model.trim="persona.direccion" required="true" autofocus placeholder="ZONA, AVENIDA O CALLE Y NRO"  />
                    </div>

                    <div class="field">
                        <label for="f_nac"><b>FECHA DE NACIMIENTO</b></label>
                        <InputText id="f_nac" type="date" v-model.trim="persona.f_nac" required="true" autofocus placeholder="FECHA DE NACIMIENTO"  />
                    </div>

                    <div class="field">
                        <label for="ci"><b>CARNET DE IDENTIDAD</b></label>
                        <InputText id="ci" type="number" v-model.trim="persona.ci" required="true" autofocus placeholder="CARNET DE IDENTIDAD"  />
                    </div>

                    <div class="field">
                        <label for="extension" class="mb-1"><b>EXTENSION</b></label>
                        <Dropdown id="seleccionarArea" v-model="persona.extensiones" :options="extensiones" optionLabel="lugar" placeholder="SELECCIONAR EL ÁREA">
                            <template #value="slotProps">
                                <div v-if="slotProps.value && slotProps.value.value">
                                    <span :class="'persona-badge status-' + slotProps.value.value">{{ slotProps.value.lugar }}</span>
                                </div>
                             
                            </template>
                        </Dropdown>
                    </div>

                    <div class="field">
                        <label for="email"><b>CORREO ELECTRONICO</b></label>
                        <InputText id="email" type="email" v-model.trim="persona.email" required="true" autofocus placeholder="CORREO ELECTRONICO"  />
                    </div>
                    <div class="field">
                        <label for="password"><b>CONTRASEÑA</b></label>
                        <InputText id="password" type="password" v-model.trim="persona.password" required="true" autofocus placeholder="CONTRASEÑA"  />
                    </div>

                    <div class="field">
                        <label for="seleccionarArea" class="mb-1"><b>ÁREA</b></label>
                        <Dropdown id="seleccionarArea" v-model="persona.areas" :options="areas" optionLabel="nombre_area" placeholder="Seleccionar el Área">
                            <template #value="slotProps">
                                <div v-if="slotProps.value && slotProps.value.value">
                                    <span :class="'persona-badge status-' + slotProps.value.value">{{ slotProps.value.id }}</span>
                                </div>
                             
                            </template>
                        </Dropdown>
                    </div>

                    <div class="field">
                        <label for="seleccionarCarrera" class="mb-3"><b>CARRERA</b></label>
                        <Dropdown id="seleccionarCarrera" v-model="persona.carreras" :options="carreras" optionLabel="nombre_carrera" placeholder="Seleccionar la Carrera">
                            <template #value="slotProps">
                                <div v-if="slotProps.value && slotProps.value.value">
                                    <span :class="'persona-badge status-' + slotProps.value.value">{{ slotProps.value.id }}</span>
                                </div>
                            </template>
                        </Dropdown>
                    </div>

                    <div class="field">
                        <label for="seleccionarGeneracion" class="mb-3"><b>GENERACIÓN</b></label>
                        <Dropdown id="seleccionarGeneracion" v-model="persona.generacions" :options="generacions" optionLabel="generacion" placeholder="Seleccionar la Generación">
                            <template #value="slotProps">
                                <div v-if="slotProps.value && slotProps.value.value">
                                    <span :class="'persona-badge status-' + slotProps.value.value">{{ slotProps.value.id }}</span>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                   
                        <div class="grid">
                            <div class="col-12">
                                <div class="card">
                                    <h5>Advanced</h5>
                                    <FileUpload name="demo[]" @uploader="onUpload" :multiple="true" accept="image/*" :maxFileSize="1000000" customUpload />
                    
                                    <h5>Basic</h5>
                                    <FileUpload mode="basic" name="demo[]" accept="image/*" :maxFileSize="1000000" @uploader="onUpload" customUpload />
                                </div>
                            </div>
                            <Toast />
                        </div>
                    

                 

                    <template #footer>
                        <Button label="Cancel" icon="pi pi-times" class="p-button-text" @click="hideDialog" />
                        <Button label="Save" icon="pi pi-check" class="p-button-text" @click="guardarpersona" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deletepersonaDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="persona"
                            >Esta seguro en eliminar el Área de <b>{{ persona.nombre_persona }}</b
                            >?</span
                        >
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deletepersonaDialog = false" />
                        <Button label="Yes" icon="pi pi-check" class="p-button-text" @click="deletepersona" />
                    </template>
                </Dialog>

                <Dialog v-model:visible="deletepersonasDialog" :style="{ width: '450px' }" header="Confirm" :modal="true">
                    <div class="flex align-items-center justify-content-center">
                        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                        <span v-if="persona">Are you sure you want to delete the selected personas?</span>
                    </div>
                    <template #footer>
                        <Button label="No" icon="pi pi-times" class="p-button-text" @click="deletepersonasDialog = false" />
                        <Button label="Yes" icon="pi pi-check" class="p-button-text" @click="deleteSelectedpersonas" />
                    </template>
                </Dialog>
            </div>
        </div>
    </div>
    
</template>

<style scoped lang="scss"></style>
