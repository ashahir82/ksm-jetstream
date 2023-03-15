<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Table from '@/Components/Table.vue';
import TableHeadRow from '@/Components/TableHeadRow.vue';
import TableHeadCell from '@/Components/TableHeadCell.vue';
import TableBodyRow from '@/Components/TableBodyRow.vue';
import TableBodyCell from '@/Components/TableBodyCell.vue';

defineProps(['ceremonies'])
</script>

<template>
    <AppLayout title="Ceremony">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ceremony
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Table>
                        <template #header>
                            <TableHeadRow>
                                <TableHeadCell>Bil</TableHeadCell>
                                <TableHeadCell>Name</TableHeadCell>
                                <TableHeadCell>Avatar</TableHeadCell>
                                <TableHeadCell>Description</TableHeadCell>
                                <TableHeadCell>Start Date</TableHeadCell>
                                <TableHeadCell>End Date</TableHeadCell>
                                <TableHeadCell>Action</TableHeadCell>
                            </TableHeadRow>
                        </template>
                        <template #default>
                            <TableBodyRow v-for="(ceremony, index) in ceremonies.data" :key="index">
                                <TableBodyCell>{{ ceremony.id }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony.name }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony.avatar }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony.description }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony.start_date }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony.end_date }}</TableBodyCell>
                                <TableBodyCell>Edit / Delete</TableBodyCell>
                            </TableBodyRow>
                        </template>
                    </Table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
