<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Table from '@/Components/Table.vue';
    import TableHeadRow from '@/Components/TableHeadRow.vue';
    import TableHeadCell from '@/Components/TableHeadCell.vue';
    import TableBodyRow from '@/Components/TableBodyRow.vue';
    import TableBodyCell from '@/Components/TableBodyCell.vue';
import { onMounted } from 'vue';

    const props = defineProps({
        ceremonies: {
            type: Object,
            default: {},
        }
    });

    function getCeremonies() {
        axios
        .get(route("api.ceremony.index"))
        .then((resp) => {
            //executed when request complete
            console.log("ceremonies", resp);
        })
        .catch((err) => {
            // executed when response is error
            console.error("err", err);
        })
        .finally(() => {
            //always executed
            console.log("end");
        })
    }

    onMounted(() => {
        getCeremonies();
    });
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
                                <TableBodyCell>{{ ceremony . id }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony . name }}</TableBodyCell>
                                <TableBodyCell><img class="w-10 h-10 rounded" :src="ceremony.avatar"></TableBodyCell>
                                <TableBodyCell>{{ ceremony . description }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony . start_date }}</TableBodyCell>
                                <TableBodyCell>{{ ceremony . end_date }}</TableBodyCell>
                                <TableBodyCell>Edit / Delete</TableBodyCell>
                            </TableBodyRow>
                        </template>
                    </Table>
                </div>
                <!-- Pagination -->
                <div class="flex flex-col items-center">
                    <!-- Help text -->
                    <span class="text-sm text-gray-700 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-900 dark:text-white">{{ ceremonies . from }}</span> to
                        <span class="font-semibold text-gray-900 dark:text-white">{{ ceremonies . to }}</span> of <span
                            class="font-semibold text-gray-900 dark:text-white">{{ ceremonies . total }}</span> Entries
                    </span>
                    <div class="inline-flex mt-2 xs:mt-0">
                        <!-- Buttons -->
                        <a v-if="ceremonies.prev_page_url" :href="ceremonies.prev_page_url"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Prev
                        </a>
                        <a v-if="ceremonies.next_page_url" :href="ceremonies.next_page_url"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                            <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
