<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card panel-default">
                    <div class="card-header">Let's talk about your goals</div>

                    <div class="card-body">
                        <goal-form></goal-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {goalForm} from './GoalForm.vue'
    export default {
        components:['goalForm'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            createGoal(){
                //use axios to post result
            },
            getGoals(){

            }
        }
    }
</script>
