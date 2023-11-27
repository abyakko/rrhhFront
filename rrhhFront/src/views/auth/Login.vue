<script>
import axios from 'axios';
export default {
    name: 'login',
    data() {
        return {
            usuario: {
                email: '',
                password: ''
            }
        };
    },
    methods: {
        login() {
            axios
            .post(`${import.meta.env.API_BASE_URL}/usuarios/login`, {
                    email: this.usuario.email,
                    password: this.usuario.password
                })
                .then((result) => {
                    // Redirigir al usuario a la página deseada después del inicio de sesión
                    if (result.data.data == false) {
                        this.$router.push('/');
                        console.log(result.data);
                    } else {
                        this.$router.push('/dashboard'); // Asegúrate de que la ruta sea correcta según tu configuración
                        console.log(result.data);
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    }
};
</script>
<template>
    <div class="surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
        <div class="flex flex-column align-items-center justify-content-center">
            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(0, 209, 70, 0) 30%)">
                <div class="w-full surface-card py-4 px-3 sm:px-4" style="border-radius: 60px">
                    <div class="text-center mb-5">
                        <img src="/demo/images/login/logofacebol.jpg" style="border-radius: 10px" alt="Image" height="100" class="mb-3" />
                        <div class="text-900 text-3xl font-medium mb-3">BIENVENIDOS</div>
                        <div class="text-900 text-3xl font-medium mb-3">FACEBOL S.R.L.</div>
                        <span class="text-600 font-medium">SISTEMA DE ASISTENCIA</span>
                    </div>
                    <div>
                        <label for="email1" class="block text-900 text-xl font-medium mb-2">Correo</label>
                        <InputText id="email1" v-model="usuario.email" type="text" placeholder="Correo / Usuario" class="w-full md:w-30rem mb-5" style="padding: 1rem" />
                        <label for="password1" class="block text-900 font-medium text-xl mb-2">Contraseña</label>
                        <Password id="password1" v-model="usuario.password" placeholder="Contraseña" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>
                        <div class="flex align-items-center justify-content-between mb-5 gap-5">
                            <div class="flex align-items-center">
                                <Checkbox v-model="checked" id="rememberme1" binary class="mr-2"></Checkbox>
                                <label for="rememberme1">Recordar Contraseña</label>
                            </div>
                        </div>
                        <Button label="Ingresar" class="w-full p-3 text-xl" @click="login" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />
</template>
<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
</style>
