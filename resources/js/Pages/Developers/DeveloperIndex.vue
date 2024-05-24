<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref } from "vue";

const { props } = usePage();

let term = ref(props.term || '');

defineProps({
    developers: {
        type: Object,
        required: true,
    },
});

function search() {
    const url = route('developer.index');
    router.get(url, { term: term.value }, { preserveState: true, preserveScroll: true });
}

</script>

<template>
    <AppLayout title="Desenvolvedores">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Desenvolvedores
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="p-4">
                        <label for="search">Pesquisar</label>
                        <input id="search" type="text" v-model="term" @keyup="search" class="ml-2 px-2 py-1 text-sm rounded border">
                    </div>

                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-900 text-white">
                                <th class="px-2 py-1 text-sm font-bold text-left">Nome</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">Email</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">GitHub</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">Empresa</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">Localização</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">Repositórios Públicos</th>
                                <th class="px-2 py-1 text-sm font-bold text-left">Seguidores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(developer, index) in developers.data" :key="developer.id" :class="{'bg-gray-100': index % 2 === 0}">
                                <td class="px-2 py-1 text-sm text-left">{{ developer.name }}</td>
                                <td class="px-2 py-1 text-sm text-left">{{ developer.email ?? 'Não informado' }}</td>
                                <td class="px-2 py-1 text-sm text-left"><a target="_blank" :href='developer.html_url'>@{{ developer.html_url.split('/').pop() }}</a></td>
                                <td class="px-2 py-1 text-sm text-left">{{ developer.company ?? 'Não informado' }}</td>
                                <td class="px-2 py-1 text-sm text-left">{{ developer.location ?? 'Não informado' }}</td>
                                <td class="px-2 py-1 text-sm text-left">{{ developer.public_repos }}</td>
                                <td class="px-2 py-1 text-sm text-left">{{ developer.followers }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="p-5 flex justify-end">
                        <Link class="px-2" :href="developers.prev_page_url">Anterior</Link>
                        <Link class="px-2" :href="developers.next_page_url">Próxima</Link>
                    </div>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
