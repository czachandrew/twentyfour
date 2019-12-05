<template>
   <div>
      <ul class="list-group">
         <li v-for="goal in goals" class="list-group-item">
            {{goal.title}}<br>
            {{goal.description}}
         </li>
      </ul>
   </div>
</template>
<script>
   export default {
      data(){
         return {
            goals:[]
         }
      },
      methods: {
         getGoals(){
            
         }
      },
      mounted(){
         console.log('Table mounted')
      }
   }
</script>