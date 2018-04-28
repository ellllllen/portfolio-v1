/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('line-chart', require('./components/LineChart.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: "TYPE HERE!",
        newName: "",
        names: ['Ellen', 'Bob', 'Pandy', 'Wendy'],
        isButtonClass: false,
        tasks: [
            {description: 'Do washing up', completed: false},
            {description: 'Clear inbox', completed: false},
            {description: 'Make dinner', completed: false},
            {description: 'Cut the grass', completed: false},
            {description: 'Clean room', completed: false},
        ],
    },
    methods: {
        addName() {
            this.names.push(this.newName);
            this.newName = "";
        },
        changeButtonClass() {
            if (this.isButtonClass) {
                this.isButtonClass = false;
            }
            else {
                this.isButtonClass = true;
            }
        },
        toggleTaskComplete(key) {
            this.tasks[key].completed = !this.tasks[key].completed;
        }
    },
    computed: {
        incompletedTasks() {
            return this.tasks.filter(task => !task.completed);
        },
        completedTasks() {
            return this.tasks.filter(task => task.completed);
        },
    }
});