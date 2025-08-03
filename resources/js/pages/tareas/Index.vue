<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'
import { Check } from 'lucide-vue-next';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow, } from '@/components/ui/table'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tareas',
        href: '/tareas',
    },
];

const page = usePage()
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
                        <TableHead class="text-right">
                        Amount
                        </TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                    <TableRow>
                        <TableCell class="font-medium">
                        INV001
                        </TableCell>
                        <TableCell>Paid</TableCell>
                        <TableCell>Credit Card</TableCell>
                        <TableCell class="text-right">
                        $250.00
                        </TableCell>
                    </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
