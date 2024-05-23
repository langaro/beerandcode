<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    developers: {
        type: Object,
        required: true,
    },

});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Desenvolvedores
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-900 text-white">
                                <th class="px-2 py-1 text-sm font-bold text-left">Nome</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(developer, index) in developers.data" :key="developer.id" :class="{'bg-gray-100': index % 2 === 0}">
                                <td class="px-2 py-1 text-sm text-left">{{ developer.name }}</td>
                                <td class="px-2 py-1 text-sm text-left">{{ developer.email ?? 'Não informado' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="p-5 flex justify-end">
                        <inertia-link class="px-2" :href="developers.prev_page_url">Anterior</inertia-link>
                        <inertia-link class="px-2" :href="developers.next_page_url">Próxima</inertia-link>
                    </div>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
