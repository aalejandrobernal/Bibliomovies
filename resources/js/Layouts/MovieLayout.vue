<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Banner1 from '@/Components/Banner1.vue';
import NavBar from '@/Components/NavBar.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

// const logout = () => {
//     router.post(route('logout'));
// };
</script>

<template>
    <Head :title="title" />
    <!-- <div class="relative  min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> -->
        <NavBar/>
        <div class="px-20">
            <slot/>
        </div>
        <!-- <Banner1/> -->
    <!-- </div> -->
    
   
</template>