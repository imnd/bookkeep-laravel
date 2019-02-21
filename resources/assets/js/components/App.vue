<template>
    <div id="container">
        <ul class="main_menu">
            <li class="left">
                <router-link to="/clients/home" class="nav-link">Home</router-link>
            </li>
            <li>
                <router-link to="/clients/list" class="nav-link">Список</router-link>
            </li>
            <li class="right">
                <router-link to="/clients/create" class="nav-link">Создать</router-link>
            </li>
        </ul>
        <div class="wrapper">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>
    export default {}
</script>