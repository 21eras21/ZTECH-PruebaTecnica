<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'
import { Check } from 'lucide-vue-next';

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
        </div>
    </AppLayout>
</template>
