<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'
import { Check } from 'lucide-vue-next';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow, } from '@/components/ui/table'

interface Tarea {
    id: number,
    titulo: string,
    descripcion: string,
    fechalimite: Date,
    estado: string,
    usuarioasignado: string,
}

interface Props{
    tareas: Tarea[];
}

//Traer props de Inertia
const props=defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tareas',
        href: '/tareas',
    },
];

const page = usePage()

const handleDelete = (id: number) =>{
    if(confirm('¿Desea eliminar esta tarea?')){
        router.delete(route('tareas.destroy', {id}));
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <div v-if="$page.props.flash?.message" class="mb-4">
                <Alert class="bg-green-500">
                    <Check class="h-4 w-4"/>
                    <AlertTitle>Confirmación!</AlertTitle>
                    <AlertDescription>
                        {{ $page.props.flash.message }}
                    </AlertDescription>
                </Alert>
            </div>
            
            <Link :href="route('tareas.create')"><Button>Crear tarea</Button></Link>

            <div>
                <Table>
                    <TableCaption>Listado de las tareas.</TableCaption>
                    <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]">
                        ID
                        </TableHead>
                        <TableHead>Título</TableHead>
                        <TableHead>Descripción</TableHead>
                        <TableHead>Fecha Límite</TableHead>
                        <TableHead>Estado</TableHead>
                        <TableHead>Usuario Asignado</TableHead>
                        <TableHead class="text-center">
                        Acción
                        </TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="tarea in props.tareas" :key="tarea.id">
                            <TableCell>{{ tarea.id }}</TableCell>
                            <TableCell class="font-medium">{{ tarea.titulo }}</TableCell>
                            <TableCell>{{ tarea.descripcion }}</TableCell>
                            <TableCell>{{ tarea.fechalimite }}</TableCell>
                            <TableCell>{{ tarea.estado }}</TableCell>
                            <TableCell>{{ tarea.usuarioasignado }}</TableCell>
                            <TableCell class="text-center space-x-2">
                                <Link :href="route('tareas.edit', {id: tarea.id})"><Button class="bg-blue-500">Editar</Button></Link>
                                <Button class="bg-red-500" @Click="handleDelete(tarea.id)">Eliminar</Button>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
