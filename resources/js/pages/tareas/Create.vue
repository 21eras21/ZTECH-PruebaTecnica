<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear tarea',
        href: '/tareas/create',
    },
];
</script>

<template>
    <Head title="Crear tarea" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <!-- Sección donde están los inputs para crear una tarea -->
            <form class="w-8/12 space-y-4">
                <div class="space-y-2">
                    <Label for="Título de la tarea">Título</Label>
                    <Input type="text" placeholder="Título"/>
                </div>
                <div class="space-y-2">
                    <Label for="Descripción de la tarea">Descripción</Label>
                    <Input type="text" placeholder="Descripción"/>
                </div>
                <div class="space-y-2">
                    <Label for="Fecha límite de la tarea">Fecha límite</Label>
                    <Input type="text" placeholder="Fecha límite"/>
                </div>
                <div class="space-y-2">
                    <Label for="Estado de la tarea">Estado</Label>
                    <Input type="text" placeholder="Estado"/>
                </div>
                <div class="space-y-2">
                    <Label for="Usuario asignado de la tarea">Usuario</Label>
                    <!--<Input type="text" placeholder="Estado"/>-->
                </div>
            </form>
        </div>
    </AppLayout>
</template>
