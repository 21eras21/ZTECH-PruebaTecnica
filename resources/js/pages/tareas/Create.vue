<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue, } from '@/components/ui/select'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear tarea',
        href: '/tareas/create',
    },
];

const form = useForm({
    titulo: '',
    descripcion: '',
    fecha: '',
    estado: '',
    usuario: ''
})
</script>

<template>
    <Head title="Crear tarea" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <!-- Sección donde están los inputs para crear una tarea -->
            <form class="w-8/12 space-y-4">
                <div class="space-y-2">
                    <Label for="Título de la tarea">Título</Label>
                    <Input v-model="form.titulo" type="text" placeholder="Título de la tarea"/>
                    <div class="text-sm text-red-600" v-if="form.errors.titulo">({ form.errors.titulo })</div>
                </div>
                <div class="space-y-2">
                    <Label for="Descripción de la tarea">Descripción</Label>
                    <Input type="text" placeholder="Descripción de la tarea"/>
                </div>
                <div class="space-y-2">
                    <Label for="Fecha límite de la tarea">Fecha límite</Label>
                    <input type="date" id="fecha" name="fecha-limite" value="00-00-0000" min="2025-01-01" max="2030-12-31"/>
                </div>
                <div class="space-y-2">
                    <Label for="Estado de la tarea">Estado</Label>
                    <Select>
                        <SelectTrigger>
                            <SelectValue placeholder="Selecciona el estado de la tarea" />
                            </SelectTrigger>
                            <SelectContent>
                            <SelectGroup>
                                <SelectItem value="pendiente">
                                Pendiente
                                </SelectItem>
                                <SelectItem value="enprogreso">
                                En progreso
                                </SelectItem>
                                <SelectItem value="completada">
                                Completada
                                </SelectItem>
                            </SelectGroup>
                            </SelectContent>
                    </Select>
                </div>
                <div class="space-y-2">
                    <Label for="Usuario asignado de la tarea">Usuario</Label>
                    <Input type="text" placeholder="Usuario asignado de la tarea"/>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
