<template>

    <div class="grey-background">


        <div class="container">
            <h3 class="center-text heading-3-montserrat-left-blac">{{title}}</h3>

            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                                
                            <div class="card-questions" v-if="goals[1]">

                                What is your skiing goal today?
                                    
                            </div>
                        
                        </div>
                    </div>
                    <div class="row" v-if="goals[1]" >
                        <div class="col">
                            <v-select :items="goals" box label="Select a goal" v-model="surveyAnswers.pages.goals.answers['My skiing goal today?']"></v-select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
                                  
      

</template>


<script>

export default {

    data: ()=> ({

        goals: [], //goal object (needs to be an array for the drop down menu)
        equipmentQuestionTrigger: false
    }),

    mounted() {

        this.goals = Object.values(this.myGoals.goals);
        console.log(this.goals);


    },

    props: {

        myGoals : {},

        surveyAnswers: {},

        title: {

            type: String,
            default: 'My Goals'
        }

        
    },

    methods: {

        handleButton: function(buttonSource){

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;   
        }       
    }    
}

</script>