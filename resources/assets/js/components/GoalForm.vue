<template>
   <div>
      <form>
         <div class="form-group">
            <label for="title">
               What's your goal?
            </label>
            <input type="text" v-model="goal.title" class="form-control" name="title" />
         </div>
         <div class="form-group">
            <label for="description">
               Additional Info
            </label>
            <textarea class="form-control" name="description" v-model="goal.description"></textarea>
         </div>
         <div class="form-group">
            <label>
               What type of goal is this? 
            </label>
            <select class="form-control" v-model="goal.goal_type">
               <option value="time">Time</option>
               <option value="count">Count</option>
            </select>
         </div>
         <div class="form-group" v-if="goal.goal_type !== null && goal.goal_type == 'time'">
            <label for="timeframe">
               I want to complete this every:
            </label>
            <select class="form-control">
               <option>Day</option>
               <option>Week</option>
               <option>Month</option>
               <option>Year</option>
            </select>
         </div>
         <div class="form-group" v-if="goal.goal_type !== null && goal.goal_type == 'count'">
            <label>What is the term for the count?</label>
            <input type="text" class="form-control" v-model="count_term" /> 
            <small id="termHelp" class="form-text text-muted">If you goal is to do 100 pushups the unit is pushups, read 100 pages - the unit is pages</small>
         </div>
         <div class="form-group" v-if="goal.goal_type !== null && goal.goal_type == 'count' && count_term !== ''">
            <label>How many {{count_term}} do you want to do per day?</label><br>
            <input type="number" class="form-control col-md-4" v-model="goal.quantity" /> <br>
         </div>
         <div class="form-group col-md-6">
            <label>Start Time</label>
            <input type="time" class="form-control" v-model="goal.start_time" />

         </div>
         <div class="form-group col-md-6">
            <label>End Time</label>
            <input type="time" class="form-control" v-model="goal.end_time" />
         </div>
         <div class="form-group">
            <button type="button" class="btn btn-primary" @click="setDifference">Set Time</button>
         </div>

         <!-- <div class="form-group">
            <label for="quantity">
               Quantity
            </label>
            <input type="number" class="form-control" v-model="goal.quantity" />
            <small id="quantityHelp" class="form-text text-muted">All goals have a count 1000 push ups, 100 pages, 20 minutes of meditation</small>
         </div> -->

         <div class="form-group">
            <button type="button" class="btn btn-primary">Create Goal</button>
         </div>
      </form>
      <ul class="list-group" v-for="(task, index) in stagedTasks" v-if="stageTasks.length > 0">
         <li class="list-group-item">{{task.count}} {{task.item}} at  {{task.time}} <button class="btn btn-primary float-right" @click="removeStagedTask(index)">x</button></li>
      </ul>
   </div>
</template>
<script>
let moment = require('moment')
export default { 
   data() {
      return{
         goal: {
            title:'',
            description:'',
            quantity: '',
            goal_type:null,
            numerical_unit:'',
            start_time: '08:00',
            end_time:'16:00'
         },
         count_term:'',
         moment:moment,
         sections:0,
         perSection:0,
         stagedTasks: [
         ]
      }
   },
   methods:{
      createGoal(){

      },
      manageError(){

      },
      setDifference(){
         let start = moment.utc(this.goal.start_time, 'HH:mm')
         let end = moment.utc(this.goal.end_time, 'HH:mm')
         let diff = moment.duration(end.diff(start))
         this.stageTasks(diff._data.hours)
      },
      removeStagedTask(index){
         let self = this
         console.log('We are removing ' + index);
         this.stagedTasks.splice(index, 1)
         //check and see if there are still elements present 
         if(this.stagedTasks.length > 0){
            //update the count per opp
            //get the nwe count 

            let newCount =  Math.round(self.goal.quantity/this.stagedTasks.length)
            let i = 0 
            while(i < this.stagedTasks.length){
               this.stagedTasks[i].count = newCount
               i++
            }

         }
         
      },
      stageTasks(sections){
         //console.log(this.sections + " sections of " + Math.round(this.goal.quantity/this.sections));
         console.log('Here are the sections required' + sections)
         this.perSection = Math.round(this.goal.quantity/sections)
         let i = 0;
         while(i < sections){
            console.log ('loop')
            this.stagedTasks.push({count:this.perSection, item:this.count_term, time: moment(this.goal.start_time, 'HH:mm').add(i, 'hours').format('HH:mm A')})
            i++
         }
         console.log(this.stagedTasks)
      }
   },
   mounted(){
      console.log('Goal form mounted')
   }
}
</script>