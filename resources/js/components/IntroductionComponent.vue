<!-- This component will house the template for the introduction 
     segment of the survey
-->

<template>
    <div id="app">
       
        <plan-component vbind:title="The Plan" :date=pageInfo.date :focuses="pageInfo.focuses" :notes="pageInfo.notes"></plan-component>
        
        <lastDay-component :lastDay="pageInfo.last_day"></lastDay-component>
    </div>
</template>

<script>

import PlanComponent from './PlanComponent'
import LastDayComponent from './LastDayComponent'


export default {

    props: {
        pageInfo: {
            type: Object //object containing page info for introduction
        }
    },

    data: () =>({
        title : null,
        focuses : {}

    }),

    mounted(){
        
        this.focuses = this.pageInfo.focuses;
        
      
        console.log(this.pageInfo);
        console.log('before intro focus');
        console.log(this.focuses);
        console.log('after intro focus');

    },

    
    
}
</script>