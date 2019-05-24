<!-- This component will house the template for the introduction 
     segment of the survey
-->

<template>

    <div id="app" >

        <h3 class="center-text heading-3-montserrat-center-black header-pad">Introduction</h3>

        <!-- Plan component vue -->
        <plan-component vbind:title="The Plan" :date=pageInfo.date :focuses="pageInfo.focuses" :notes="pageInfo.notes"></plan-component>
        
        <!-- Last day component vue -->
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
        },

        introSurveyAnswers : {

            type: Object //survey answers 
        }
    },

    data: () =>({

        title : null,
        focuses : {},
        scrollLast: 0 //trying to set up auto scrolling to section

    }),

    mounted(){
        
        this.focuses = this.pageInfo.focuses;     
        console.log(this.introSurveyAnswers)

    },

    created () {

        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed () {

        window.removeEventListener('scroll', this.handleScroll);
    },

    methods: {
        
        handleSCroll: function(){

            var scrollDirection = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollDirection > scrollLast)
            {
                console.log("SCROLL DOWN");
            }
            else
            {
                console.log("SCROLL UP");
            }

            scrollTo('#bottom', 500, { easing: 'linear', offset: -50 });
        }
    } 
}

</script>