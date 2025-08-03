<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'
import { handleError } from 'vue';


interface Tarea{
    id: number,
    titulo: string,
    descripcion: string,
    fechalimite: Date,
    estado: string,
    usuarioasignado: string,
}

const props=defineProps<{tarea: Tarea}>();

const form = useForm({
    titulo: props.tarea.titulo,
    descripcion: props.tarea.descripcion,
    fechalimite: props.tarea.fechalimite,
    estado: props.tarea.estado,
    usuarioasignado: props.tarea.usuarioasignado
})

const handleSubmit = () => {
    form.put(route('tareas.update', {tarea: props.tarea}));
}

</script>

<template>
    <Head title="Editar tarea" />

    <AppLayout :breadcrumbs="[{ title: 'Editar tarea', href: `/tareas/${props.tarea.id}/edit`}]">
        <div class="p-4">
            <!-- Sección donde están los inputs para crear una tarea -->
            <form @submit.prevent="handleSubmit" class="w-8/12 space-y-4">
                <div class="space-y-2">
                    <Label for="Título de la tarea">Título</Label>
                    <Input v-model="form.titulo" type="text" placeholder="Título de la tarea"/>
                    <div class="text-sm text-red-600" v-if="form.errors.titulo">({ form.errors.titulo })</div>
                </div>
                <div class="space-y-2">
                    <Label for="Descripción de la tarea">Descripción</Label>
                    <Input v-model="form.descripcion" type="text" placeholder="Descripción de la tarea"/>
                    <div class="text-sm text-red-600" v-if="form.errors.descripcion">({ form.errors.descripcion })</div>
                </div>
                <div class="space-y-2">
                    <Label for="Fecha límite de la tarea">Fecha límite</Label>
                    <Input v-model="form.fechalimite" type="text" placeholder="AAAA-MM-DD"/>
                    <!--La idea principal es colocar un Calendar para que se pueda seleccionar la fecha-->
                    <!--No está quedando bien, por lo que se borró y se colocará un Input normal en su lugar por el momento-->
                    <!--<input v-model="form.fechalimite" type="date" id="fecha" name="fecha-limite" value="00-00-0000" min="2025-01-01" max="2030-12-31"/>-->
                    <div class="text-sm text-red-600" v-if="form.errors.fechalimite">({ form.errors.fechalimite })</div>

                </div>
                <div class="space-y-2">
                    <Label for="Estado de la tarea">Estado</Label>
                    <Select v-model="form.estado">
                        <SelectTrigger>
                            <SelectValue placeholder="Selecciona el estado de la tarea" />
                            </SelectTrigger>
                            <SelectContent>
                            <SelectGroup>
                                <SelectItem value="Pendiente">
                                Pendiente
                                </SelectItem>
                                <SelectItem value="En progreso">
                                En progreso
                                </SelectItem>
                                <SelectItem value="Completada">
                                Completada
                                </SelectItem>
                            </SelectGroup>
                            </SelectContent>
                    </Select>
                    <div class="text-sm text-red-600" v-if="form.errors.estado">({ form.errors.estado })</div>

                </div>
                <div class="space-y-2">
                    <Label for="Usuario asignado de la tarea">Usuario</Label>
                    <Input v-model="form.usuarioasignado" type="text" placeholder="Usuario asignado de la tarea"/>
                    <div class="text-sm text-red-600" v-if="form.errors.usuarioasignado">({ form.errors.usuarioasignado })</div>
                </div>
                <Button type="submit" :disabled="form.processing">Editar tarea</Button>
            </form>
        </div>
    </AppLayout>
</template>
